# Current State

作成日: 2026-06-18

## 対象

- リポジトリ: `/Users/agent/Documents/dev/taguchi-sangyo`
- ブランチ: `main`
- リモート追跡: `origin/main`
- GitHub正式slug: `A-A-D-D/taguchi-sangyo`

## リポジトリ構成

主要な構成は以下です。

| パス | 内容 |
|---|---|
| `README.md` | 空ファイル |
| `package.json` / `package-lock.json` | Node.js開発依存の定義 |
| `docs/` | 提案資料、業務・設計資料 |
| `docs/proposal/` | プロジェクト概要、課題、目的、システム全体像、DB概念、権限、WBS、UI案など |
| `docs/proposal/_proposal__exports/` | PDF、HTML、Mermaid関連のエクスポート成果物 |
| `slides/` | Marp想定のスライドMarkdownとCSS |
| `.crossnote/` | Markdown Preview Enhanced / Crossnote系のスタイル設定 |
| `.vscode/` | VS Code設定 |
| `taguchi-sangyo.code-workspace` | VS Codeワークスペース設定 |

## 使用技術

現物から確認できた技術要素:

- Markdown
- Mermaid
- Marp / Marpit
- Node.js package管理
- PDF / HTML export成果物
- CSS / LESS

`package.json` で確認できた開発依存:

- `@marp-team/marp-core`
- `@marp-team/marpit`
- `@mermaid-js/mermaid-cli`

## アプリケーション分類

現リポジトリ内の実装現物からの分類:

| 種別 | 判定 | 根拠 |
|---|---:|---|
| WordPress | テーマ/プラグイン追加を確認 | `wp-content/themes/taguchi_system` と `wp-content/plugins/*` を確認。WordPress本体、`wp-config.php`、DB状態は未確認 |
| Laravel | 実装は未確認 | `artisan`、`composer.json`、`app/`、`routes/` などが見つからない |
| 静的サイト | 本体としては未確認 | `docs/proposal/_proposal__exports/proposal_preview.html` はあるが、公開サイト実装としての構成は確認できない |
| その他 | 一部該当 | Markdown中心の提案・設計資料も同居 |

補足: `docs/proposal/08_infrastructure.md` には Laravel Application と MySQL を使う構成案が記載されています。これは資料上の想定であり、現リポジトリ内にLaravel実装が存在することは確認できていません。

## WordPress差分Audit

確認日: 2026-06-18

前提:

- Fanikaと同様に、WordPressテーマ・プラグインの配置確認として扱います。
- ECは現時点ではダミー/保留扱いとし、WooCommerce系は主要対象にしていません。
- プラグイン有効化、テーマ切替、WordPress DB操作、更新処理は行っていません。

### 追加テーマ

| 項目 | 内容 |
|---|---|
| 場所 | `wp-content/themes/taguchi_system` |
| Theme Name | `taguchi system` |
| Version | `1.0` |
| Author | `A&A` |
| 親テーマ | 未確認。`style.css` に `Template:` 指定がないため、現物上は子テーマではなく単独テーマとして扱う |

主なテンプレート:

- `index.php`
- `header.php`
- `footer.php`
- `functions.php`
- `page-*.php`
- `archive-voice.php`
- `search.php`
- `404.php`
- `woocommerce/single-product.php`
- `woocommerce/cart/cart.php`

### 追加プラグイン

| ディレクトリ | Plugin Name | Version | 分類 | メモ |
|---|---|---:|---|---|
| `wp-content/plugins/advanced-custom-fields` | Advanced Custom Fields | `6.8.4` | 必須寄り | カスタムフィールド管理用途。テーマ実装や管理画面設計と関係する可能性が高い |
| `wp-content/plugins/contact-form-7` | Contact Form 7 | `6.1.6` | 必須寄り | 問い合わせフォーム用途。`page-contact.php` があるため利用前提の可能性あり |
| `wp-content/plugins/wp-members` | WP-Members | `3.5.6` | 必須寄り | 会員登録・ログイン・アクセス制限用途。会員/マイページ系ページと関係する可能性あり |

### EC関連

WooCommerce本体プラグインは `wp-content/plugins` 配下では確認していません。

一方で、テーマ内にはWooCommerce関連のテンプレートと参照があります。

- `wp-content/themes/taguchi_system/woocommerce/single-product.php`
- `wp-content/themes/taguchi_system/woocommerce/cart/cart.php`
- `wp-content/themes/taguchi_system/page-cart.php`
- `wp-content/themes/taguchi_system/page-checkout.php`
- `wp-content/themes/taguchi_system/header.php` 内の `WC()->cart` 参照

現時点では、EC関連はダミー/保留として扱います。WooCommerce本体の導入・有効化・設定・決済・注文処理の確認は行っていません。

### 必須寄り / 任意・保留分類

必須寄り:

- Advanced Custom Fields
- Contact Form 7
- WP-Members

任意・保留:

- WooCommerce関連機能
- テーマ内の `woocommerce/` テンプレート
- カート/チェックアウト/商品詳細ページ

理由: ECは現時点ではダミー扱いの前提であり、WooCommerce本体プラグインも確認できていないため。

## 主要ドキュメント

- `docs/proposal/README.md`: 最新の優先順位、MVP/MVP+1/Proposal v1の位置付け
- `docs/proposal/01_project-overview.md`: 田口産業 建材発注・原価管理システムの概要
- `docs/proposal/02_current-issues.md`: FAX、メール、電話、紙管理の混在など現状課題
- `docs/proposal/03_goals.md`: 発注業務一元化、原価管理、承認フロー、価格改定管理
- `docs/proposal/04_system-overview.md`: 建材EC、会員管理、現場管理、商品管理、承認フロー等の機能案
- `docs/proposal/06_permissions.md`: ロール別権限マトリクス
- `docs/proposal/07_db.md`: DB概念図
- `docs/proposal/08_infrastructure.md`: MVP/拡張構成のインフラ図
- `docs/proposal/09_wbs.md`: 要件定義からリリースまでのWBS
- `docs/order-status.md`: 注文ステータス遷移

## Proposal優先順位整理

整理日: 2026-06-18

今回の整理は、要求変更ではなく優先順位変更として扱います。

理由:

- 提案時点では業務要件と意思決定権者の合意範囲が未確定だったため。
- 初期提案では受発注管理システム全体を想定していたため。
- 元請けおよび意思決定者との要件確認の結果、現時点で合意可能な範囲は「FAX・電話による発注業務のオンライン化」であることが判明したため。

現時点の位置付け:

| 区分 | 内容 |
|---|---|
| Proposal v1 | 将来構想・拡張構想。EC、会員、カート、決済、注文管理、承認、原価管理、管理画面等を含む |
| MVP | FAX/電話発注のオンライン化。Webフォーム、メール送信、PDF発注書生成に限定 |
| MVP+1 | PDF自動保存・自動印刷。受注用PC側の運用補助案であり、MVP必須要件ではない |

MVP本体:

- 現場担当者がWebフォームで発注内容を入力
- 本社・管理側へメール送信
- 入力内容からPDF発注書を生成
- PDFをメール添付、または管理側が確認可能な形で保存

MVP対象外・後工程:

- EC
- 会員制
- カート
- 決済
- 本格的な注文管理システム
- 管理画面
- 在庫管理
- 配送管理
- 会員管理
- 承認フロー
- 現場別原価管理

MVP+1:

- 生成したPDFを受注用PCに自動保存する
- 受注用PC側でPDFを自動プリントアウトする

MVP+1は、FAX運用に近い受け取り体験を維持するための追加案です。サーバーから直接プリントする前提にはせず、「PDF生成 -> 受注用PCが取得/同期 -> 印刷」の構成案として扱います。

## エントリポイント

実装アプリケーションとしてのエントリポイントは未確認です。

資料閲覧・生成の入口候補:

- `docs/proposal/proposal_preview.md`
- `docs/proposal/_proposal__exports/proposal_preview.html`
- `slides/00_title.md`
- `slides/01_summary.md`

ただし `package.json` に `scripts` は定義されていないため、標準化された生成コマンドは未確認です。

## README / docs / deploy / env

| 項目 | 状態 |
|---|---|
| README | `README.md` は存在するが0バイト |
| docs | `docs/` 配下に提案・設計資料あり |
| deploy関連 | deploy名のファイル、CI/CD設定は未確認。GitHub organization移行後のdeploy/orchestrate設定は別途確認が必要 |
| 環境変数サンプル | `.env.example` 等は未確認 |
| Docker設定 | `Dockerfile` / `docker-compose.*` は未確認 |
| DB設定 | 実装用DB設定ファイルは未確認 |

## GitHub Organization移行

確認日: 2026-06-18

GitHub organizationは `A-A-D-D` に移行済みとして確認しました。

正式slug:

- `A-A-D-D/taguchi-sangyo`

`git remote -v` の確認結果:

```text
origin	git@github.com:A-A-D-D/taguchi-sangyo.git (fetch)
origin	git@github.com:A-A-D-D/taguchi-sangyo.git (push)
```

README、docs、設定ファイルを確認した範囲では、旧organization/旧slugとして修正が必要な `*/taguchi-sangyo` 形式のGitHubリポジトリ参照は確認できませんでした。

deploy設定、GitHub Actions設定、orchestrate設定に該当する現物ファイルは確認できていません。存在する場合は、実変更せず、参照先が `A-A-D-D/taguchi-sangyo` と整合しているか確認が必要です。

## Git状態

確認時点の状態:

```text
## main...origin/main [ahead 2]
?? .DS_Store
?? .crossnote/config.js
?? .crossnote/head.html
?? .crossnote/parser.js
?? wp-content/.DS_Store
```

未管理ファイル:

- `.DS_Store`
- `.crossnote/config.js`
- `.crossnote/head.html`
- `.crossnote/parser.js`
- `wp-content/.DS_Store`

GitHub organization移行確認時点では、`main` は `origin/main` より2コミット進んでいます。

## 既存設定上の注意

`.vscode/settings.json` の `markdown-preview-enhanced.styleFile` に、現在の対象リポジトリとは異なる絶対パスが含まれています。

- 確認したパス: `/Users/agent/Documents/dev/laravel/taguchi-sangyo/docs/css/a4portrait.css`
- 現在のリポジトリ: `/Users/agent/Documents/dev/taguchi-sangyo`

この設定は環境依存の可能性があります。今回のAuditでは変更していません。
