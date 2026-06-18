# Current State

作成日: 2026-06-18

## 対象

- リポジトリ: `/Users/agent/Documents/dev/taguchi-sangyo`
- ブランチ: `main`
- リモート追跡: `origin/main`

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
| WordPress | 未確認 | `wp-config.php`、テーマ/プラグイン構成、PHP実装が見つからない |
| Laravel | 実装は未確認 | `artisan`、`composer.json`、`app/`、`routes/` などが見つからない |
| 静的サイト | 本体としては未確認 | `docs/proposal/_proposal__exports/proposal_preview.html` はあるが、公開サイト実装としての構成は確認できない |
| その他 | 該当 | Markdown中心の提案・設計資料リポジトリ |

補足: `docs/proposal/08_infrastructure.md` には Laravel Application と MySQL を使う構成案が記載されています。これは資料上の想定であり、現リポジトリ内にLaravel実装が存在することは確認できていません。

## 主要ドキュメント

- `docs/proposal/01_project-overview.md`: 田口産業 建材発注・原価管理システムの概要
- `docs/proposal/02_current-issues.md`: FAX、メール、電話、紙管理の混在など現状課題
- `docs/proposal/03_goals.md`: 発注業務一元化、原価管理、承認フロー、価格改定管理
- `docs/proposal/04_system-overview.md`: 建材EC、会員管理、現場管理、商品管理、承認フロー等の機能案
- `docs/proposal/06_permissions.md`: ロール別権限マトリクス
- `docs/proposal/07_db.md`: DB概念図
- `docs/proposal/08_infrastructure.md`: MVP/拡張構成のインフラ図
- `docs/proposal/09_wbs.md`: 要件定義からリリースまでのWBS
- `docs/order-status.md`: 注文ステータス遷移

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
| deploy関連 | deploy名のファイル、CI/CD設定は未確認 |
| 環境変数サンプル | `.env.example` 等は未確認 |
| Docker設定 | `Dockerfile` / `docker-compose.*` は未確認 |
| DB設定 | 実装用DB設定ファイルは未確認 |

## Git状態

確認時点の状態:

```text
## main...origin/main
?? .DS_Store
?? docs/.DS_Store
```

未管理ファイル:

- `.DS_Store`
- `docs/.DS_Store`

作業前時点では、追跡済みファイルの変更は確認されませんでした。

## 既存設定上の注意

`.vscode/settings.json` の `markdown-preview-enhanced.styleFile` に、現在の対象リポジトリとは異なる絶対パスが含まれています。

- 確認したパス: `/Users/agent/Documents/dev/laravel/taguchi-sangyo/docs/css/a4portrait.css`
- 現在のリポジトリ: `/Users/agent/Documents/dev/taguchi-sangyo`

この設定は環境依存の可能性があります。今回のAuditでは変更していません。
