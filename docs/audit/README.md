# Audit README

作成日: 2026-06-18

## 目的

このディレクトリは、田口産業プロジェクトの現状把握、リスク抽出、次工程判断の入口です。

今回のAuditでは、既存コードや既存資料の修正、パッケージ更新、DB操作、デプロイは行っていません。確認結果は、リポジトリ内の現物と既存ドキュメントから確認できた範囲に限定しています。

## Audit結果

- [current-state.md](./current-state.md): リポジトリ構成、技術要素、主要ディレクトリ、エントリポイント、Git状態
- [risks.md](./risks.md): セキュリティ・運用・管理上の注意点、公開してはいけない可能性のあるファイル
- [next-actions.md](./next-actions.md): 次に確認すべきこと、現時点で変更すべきでないもの

## 結論サマリ

- 現リポジトリは、実装アプリケーション本体ではなく、Markdownベースの提案資料、設計資料、スライド、PDF/HTMLエクスポートを中心とした資料リポジトリです。
- 差分Auditで `wp-content/themes/taguchi_system` と `wp-content/plugins/*` を確認しました。WordPressテーマ・プラグインファイルは追加済みですが、WordPress本体、DB、有効化状態は未確認です。
- `docs/proposal/08_infrastructure.md` には Laravel Application と MySQL の構成案がありますが、リポジトリ内に Laravel 実装は確認できませんでした。
- 最新の優先順位整理では、Proposal v1を将来構想・拡張構想として保持し、MVPはFAX/電話発注のオンライン化に限定します。
- MVP本体はWebフォーム、メール送信、PDF発注書生成です。PDF自動保存・自動印刷はMVP+1として分離します。
- `package.json` には Marp / Marpit / Mermaid CLI の開発依存があり、資料生成・図表生成用途と見られます。
- Git状態では `.DS_Store` と `docs/.DS_Store` が未管理ファイルとして存在します。
- `.env`、秘密鍵、DBダンプ、ログ、圧縮アーカイブに該当するファイル名は、簡易探索の範囲では確認されませんでした。

## 分類

現物ベースの分類: WordPressテーマ/プラグインファイルとドキュメント・提案資料の同居リポジトリ

資料上の想定: Laravel + MySQL によるWeb業務システム

## 注意

本Auditは読み取り中心の一次確認です。秘密情報の中身の出力は行っていません。ファイル名・構成・設定から判断できる範囲のみを記録しています。
