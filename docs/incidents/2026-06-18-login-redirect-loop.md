# インシデント: ログインページ ERR_TOO_MANY_REDIRECTS

## 基本情報

| 項目 | 内容 |
| --- | --- |
| 発生日 | 2026-06-18 |
| 対象 | `https://dev.taguchi-s.design-arts.jp` |
| 対象ページ | ログインページ（`/wp-login.php`、`/login/`） |
| 報告症状 | `ERR_TOO_MANY_REDIRECTS`。Cookie 削除でも改善しない |

## 症状

- ブラウザでログインページにアクセスすると `ERR_TOO_MANY_REDIRECTS` が発生
- Cookie を削除しても改善しない（サーバー側のリダイレクトが原因のため）
- `curl -I -L` では直接 `HTTP/2 200` が返り、ループは見えない
  （Basic 認証後に WordPress に到達して初めて発生する）

## 原因

`wp-content/themes/taguchi_system/functions.php` の `restrict_access()` 関数
（`template_redirect` フック）に、ロール未処理のループバグが存在した。

### バグの構造

```text
restrict_access() のロール分岐:
  ├─ ログイン済み && shop_manager → $allowed_slugs = [manager, ...]
  ├─ ログイン済み && subscriber   → $allowed_slugs = [products, ...]
  └─ ログイン済み && それ以外     → $allowed_slugs = [] ← 空のまま（バグ）
```

`administrator`（および WooCommerce `customer` 等、未定義ロール）で
ログインしてフロントエンドにアクセスすると:

1. `$allowed_slugs = []` のため、どのスラッグも `in_array()` で false
2. → `/login/` にリダイレクト
3. `/login/` も `in_array('login', [])` = false
4. → 再び `/login/` にリダイレクト
5. → 無限ループ → `ERR_TOO_MANY_REDIRECTS`

WooCommerce がインストール・有効化されていたことも関係。
`/my-account/` や `/login/` 間のリダイレクトが重複していた。

## 修正内容

### 変更ファイル

`wp-content/themes/taguchi_system/functions.php`

### 変更内容

`restrict_access()` 関数の先頭に管理者バイパスを追加し、
未定義ロールの `else` 分岐を追加。

```diff
 function restrict_access() {
+    // 管理者はフロントエンドのアクセス制限を適用しない
+    if (current_user_can('administrator')) {
+        return;
+    }
+
     $allowed_slugs = [];
     $redirect_page = '/login/';
     if(is_user_logged_in()) {
     //ログイン済み
         if(current_user_can('shop_manager')) {
             // ...
-        } else if(current_user_can('subscriber')) {
+        } elseif(current_user_can('subscriber')) {
             // ...
+        } else {
+        // customer 等、未定義ロール → ループ防止のため最低限のページを許可
+            $allowed_slugs = [
+                'login',
+                'company',
+                'privacy-policy',
+                'law',
+            ];
+            $redirect_page = '/login/';
         }
     } else {
```

### バックアップ

修正前のファイルを以下に保存済み:

```text
wp-content/themes/taguchi_system/functions.php.bak-20260618
```

## 確認方法

```bash
# 1. リダイレクトチェーン確認（Basic 認証付き）
curl -I -L -u 'design:PASSWORD' \
  https://dev.taguchi-s.design-arts.jp/wp-login.php
curl -I -L -u 'design:PASSWORD' \
  https://dev.taguchi-s.design-arts.jp/wp-admin/

# 期待値: 302 が数回以内で 200 に落ち着く。20 回以上ループしない

# 2. ブラウザで確認
# /wp-login.php にアクセスしてログイン画面が表示されること
# ログイン後に /wp-admin/ に遷移すること

# 3. /login/ (WP-Members カスタムログインページ) でも同様に確認
```

## 再発時の確認順

ログインページで `ERR_TOO_MANY_REDIRECTS` が再発した場合、以下の順に確認する。

1. **`home` / `siteurl` オプション**
   - `wp option get home` / `wp option get siteurl`
   - `http://` と `https://` が混在していないか

2. **`wp-config.php`**
   - `WP_HOME` / `WP_SITEURL` の定義値
   - `FORCE_SSL_ADMIN` の設定
   - `$_SERVER['HTTPS']` や `HTTP_X_FORWARDED_PROTO` の補正コード
     （リバースプロキシ環境で必要）

3. **`.htaccess`**
   - WordPress rewrite ルール以外の独自リダイレクトがないか
   - Basic 認証設定と WordPress の競合

4. **HTTPS 判定**
   - nginx がリバースプロキシとして HTTP をバックエンドに転送していないか
   - SSL 終端が nginx 側で完結しているか

5. **Basic 認証**
   - Basic 認証 → WordPress の認証が二重になっていないか
   - `wp-login.php` に Basic 認証がかかっていないか（ループ要因になりうる）

6. **テーマ・プラグイン**
   - テーマの `functions.php` の `template_redirect` フック（今回の原因）
   - WP-Members / WooCommerce のログイン後リダイレクト設定
   - ロールごとのアクセス制御ロジックに未定義ロールのフォールスルーがないか

## 注意事項

- このインシデントは **田口産業** (`dev.taguchi-s.design-arts.jp`) の案件。
  Fanika とは別案件のため、fanika の docs には記録しない。
- WooCommerce がインストール済みであることを確認。監査ドキュメントでは
  「未確認」となっていたが実際には有効化されていた。
  `docs/audit/current-state.md` の EC 関連セクションの更新を検討すること。
