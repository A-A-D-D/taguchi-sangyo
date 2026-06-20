# デプロイルール

## 基本方針

| 項目 | 内容 |
| --- | --- |
| 管理リポジトリ | GitHub `A-A-D-D/taguchi-sangyo` |
| サーバー | XServer (`dev.taguchi-s.design-arts.jp`) |
| clone 先（非公開） | `~/repos/taguchi-sangyo` |
| 公開先 | `~/design-arts.jp/public_html/dev.taguchi-s.design-arts.jp` |
| デプロイ方式 | deploy-kit（`github-app-pull` → `wp-theme-deploy`） |

### なぜ公開ディレクトリに直接 clone しないか

- `.git/` が公開ディレクトリに置かれると認証情報・履歴・設定ファイルが
  HTTP でアクセス可能になるリスクがある
- `docs/`・`slides/`・`scripts/` など非公開資料が Web に露出する
- rsync による選択的な反映で「Git 管理対象 = 公開ファイル」を切り離す

---

## Git 管理対象

| パス | 管理 | 理由 |
| --- | --- | --- |
| `wp-content/themes/taguchi_system/` | ✅ 管理 | テーマ本体 |
| `wp-content/plugins/plugins.md` | ✅ 管理 | 依存プラグインリスト |
| `wp-content/plugins/` その他 | ❌ 管理しない | サーバー側で管理 |
| `wp-content/uploads/` | ❌ 絶対に管理しない | メディアファイル |
| `wp-config.php` | ❌ 管理しない | 認証情報を含む |
| `.htaccess` | ❌ 管理しない | サーバー側の既存設定を保護 |
| `docs/` | ✅ 管理（非公開） | 設計・運用資料 |
| `scripts/` | ✅ 管理（非公開） | デプロイスクリプト |

---

## rsync 反映対象

rsync は **テーマのみ** を対象とする。
追加が必要になった場合は `scripts/deploy-xserver.sh` の
`SYNC_TARGETS` セクションに追記する。

```text
反映する:
  wp-content/themes/taguchi_system/  →  公開先の同パス

反映しない（サーバー側管理）:
  wp-config.php
  .htaccess         ← 既存運用に影響するため初回は対象外
  wp-content/uploads/
  wp-content/plugins/
```

rsync 実行時の除外パターンは `scripts/rsync-exclude.txt` で管理する。

---

## 初回セットアップ手順

サーバーの SSH ログイン後に以下を実行する。

```bash
# 1. deploy-kit が利用可能なこと（github-app-clone / github-app-pull / wp-theme-deploy）

# 2. 非公開ディレクトリに clone
bash ~/repos/taguchi-sangyo/scripts/deploy-xserver.sh --init
# 内部で以下を実行: github-app-clone A-A-D-D/taguchi-sangyo ~/repos/taguchi-sangyo

# 3. 公開先のテーマディレクトリが存在することを確認
ls ~/design-arts.jp/public_html/dev.taguchi-s.design-arts.jp/wp-content/themes/

# 4. ドライランで差分確認
bash ~/repos/taguchi-sangyo/scripts/deploy-xserver.sh

# 5. 問題なければ実反映
bash ~/repos/taguchi-sangyo/scripts/deploy-xserver.sh --apply
```

---

## デプロイ手順（2回目以降）

```bash
# ドライラン（デフォルト）: 変更内容をプレビューのみ
bash ~/repos/taguchi-sangyo/scripts/deploy-xserver.sh

# 実反映
bash ~/repos/taguchi-sangyo/scripts/deploy-xserver.sh --apply
```

スクリプトは内部で `github-app-pull` → `wp-theme-deploy` を実行する。
サーバー上でテーマファイルを直接編集しないこと。

---

## 注意事項

- `wp-content/uploads/` は Git 管理・rsync 対象のいずれにも含めない。
  誤って `--delete` で消去すると復元困難になる。
- `.htaccess` は既存の Basic 認証設定・リダイレクト設定を保護するため、
  初回は rsync 対象外とする。変更が必要な場合はサーバー上で直接編集する。
- `wp-config.php` はサーバー側で管理する。DB 接続情報・秘密鍵を含むため
  Git には絶対にコミットしない。
- プラグインの追加・更新はサーバーの WordPress 管理画面または WP-CLI で行う。
  `wp-content/plugins/plugins.md` のリストを手動で更新してコミットすること。
