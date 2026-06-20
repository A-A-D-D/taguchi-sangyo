#!/bin/bash
# deploy-xserver.sh
# XServer 上でのデプロイスクリプト（deploy-kit ラッパー）
#
# 使い方:
#   bash deploy-xserver.sh          # ドライラン（差分確認のみ）
#   bash deploy-xserver.sh --apply  # 実反映
#   bash deploy-xserver.sh --init   # 初回クローン
#
# 前提:
#   - サーバー上で実行する（ローカルから SSH 越しに実行しない）
#   - deploy-kit（github-app-clone / github-app-pull / wp-theme-deploy）が利用可能なこと
#   - 初回は --init オプションで clone する

set -euo pipefail

# ── 設定 ────────────────────────────────────────────────────────────────────
REPO_SLUG="A-A-D-D/taguchi-sangyo"
REPO_DIR="$HOME/repos/taguchi-sangyo"
THEME_REL="wp-content/themes/taguchi_system"
DEST_DIR="$HOME/design-arts.jp/public_html/dev.taguchi-s.design-arts.jp/${THEME_REL}/"
# ── /設定 ───────────────────────────────────────────────────────────────────

# ── オプション解析 ──────────────────────────────────────────────────────────
APPLY=false
INIT=false
for arg in "$@"; do
  case "$arg" in
    --apply) APPLY=true ;;
    --init)  INIT=true ;;
    --help|-h)
      echo "使い方: $0 [--apply | --init]"
      echo "  オプションなし : ドライラン（変更内容の確認のみ）"
      echo "  --apply        : 実反映"
      echo "  --init         : 初回クローン（github-app-clone を実行）"
      exit 0
      ;;
    *) echo "不明なオプション: $arg" >&2; exit 1 ;;
  esac
done
# ── /オプション解析 ─────────────────────────────────────────────────────────

# ── 初回クローン ────────────────────────────────────────────────────────────
if $INIT; then
  echo "=== 初回クローン ==="
  github-app-clone "$REPO_SLUG" "$REPO_DIR"
  echo "クローン完了: $REPO_DIR"
  exit 0
fi
# ── /初回クローン ───────────────────────────────────────────────────────────

# ── 事前チェック ────────────────────────────────────────────────────────────
if [[ ! -d "$REPO_DIR/.git" ]]; then
  echo "[ERROR] リポジトリが見つかりません: $REPO_DIR" >&2
  echo "        初回セットアップ: bash $0 --init" >&2
  exit 1
fi
# ── /事前チェック ───────────────────────────────────────────────────────────

# ── リポジトリ更新 ──────────────────────────────────────────────────────────
echo "=== github-app-pull ==="
github-app-pull "$REPO_DIR"
echo ""
# ── /リポジトリ更新 ─────────────────────────────────────────────────────────

# ── テーマデプロイ ──────────────────────────────────────────────────────────
if $APPLY; then
  echo "=== wp-theme-deploy [APPLY] ==="
  wp-theme-deploy \
    --repo  "$REPO_DIR" \
    --theme "$THEME_REL" \
    --dest  "$DEST_DIR"
else
  echo "=== wp-theme-deploy [DRY-RUN] === （実際のファイルは更新されません）"
  wp-theme-deploy \
    --repo  "$REPO_DIR" \
    --theme "$THEME_REL" \
    --dest  "$DEST_DIR" \
    --dry-run
fi
echo ""
# ── /テーマデプロイ ─────────────────────────────────────────────────────────

if $APPLY; then
  echo "=== デプロイ完了 ==="
else
  echo "=== ドライラン完了 ==="
  echo "実反映するには: bash $0 --apply"
fi
