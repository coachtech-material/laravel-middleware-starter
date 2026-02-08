# Laravel Middleware Starter

ミドルウェアハンズオン（10-2-4）用のスターターキットです。

## 含まれているもの

- Laravel 10.x + Sail
- Fortify認証（ログイン / 登録 / ログアウト）
- Userモデル（is_adminカラム付き）
- テストユーザー（シーダー）
  - 管理者: admin@example.com / password
  - 一般: user@example.com / password
- AdminController
- 管理者ページ（/admin）

## セットアップ

```bash
# クローン
git clone https://github.com/coachtech-material/laravel-middleware-starter.git middleware-app-sample
cd laravel-middleware-starter

# 依存関係インストール
docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v "$(pwd):/var/www/html" \
  -w /var/www/html \
  -e COMPOSER_CACHE_DIR=/tmp/composer_cache \
  laravelsail/php82-composer:latest \
  composer install

# 環境ファイル作成
cp .env.example .env

# Sail起動
./vendor/bin/sail up -d

# アプリケーションキー生成
./vendor/bin/sail artisan key:generate

# マイグレーション・シーダー実行
./vendor/bin/sail artisan migrate --seed
```

## 動作確認

1. http://localhost にアクセス
2. admin@example.com / password でログイン
3. 「管理者ページにアクセス」をクリック → 表示される
4. ログアウトして user@example.com / password でログイン
5. 「管理者ページにアクセス」をクリック → 表示される（ミドルウェア未実装のため）

## 演習課題

カスタムミドルウェアを作成して、管理者のみが /admin にアクセスできるようにしてください。

## 実装タスク

1. CheckAdminミドルウェアを作成
2. handleメソッドに管理者チェックロジックを実装
3. Kernel.phpにミドルウェアを登録
4. /adminルートにミドルウェアを適用

## 完成後の動作

- admin@example.com でログイン → /admin アクセス → ✅ 表示される
- user@example.com でログイン → /admin アクセス → ❌ 403エラー
