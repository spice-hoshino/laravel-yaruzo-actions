# laravel-yaruzo-actions

## ローカル開発環境の起動方法

1. envファイルのコピー
   ```
   cd src/ && cp .env.example .env
   ```

2. 依存パッケージインストール
   ```
   composer install
   ```

3. Sail（Docker）起動
   ```
   ./vendor/bin/sail up -d --build
   ```

4. アプリケーションキーの生成
   ```
   ./vendor/bin/sail artisan key:generate
   ```

5. データベースのマイグレーション
   ```
   ./vendor/bin/sail artisan migrate
   ```

6. フロントエンドのビルド
   ```
   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run dev
   ```

7. アクセス方法
   - アプリケーション: http://localhost
   - デフォルトポート: 80

## 開発コマンド

- テストの実行
   ```
   ./vendor/bin/sail test
   ```

- コードスタイルチェック
   ```
   ./vendor/bin/sail php ./vendor/bin/php-cs-fixer fix --dry-run
   ```

- コンテナの停止
   ```
   ./vendor/bin/sail down
   ```

