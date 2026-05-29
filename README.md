# mogitate

## 環境構築

### Dockerビルド

- git clone git@github.com:sae0715/mogitate.git
- docker-compose up -d --build

### Laravel環境構築

- docker-compose exec php bash
- composer install
- cp .env.example .env , 環境変数を適宜変更
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## 開発環境

- 商品一覧画面：http://localhost/products
- 商品登録画面：http://localhost/products/register
- phpMyAdmin：http://localhost:8080/

## 使用技術(実行環境)

- PHP 8.2.11
- Laravel 8.83.8
- MySQL 8.0.26
- nginx 1.21.1

## ER図

```mermaid
erDiagram
    products {
        bigint id PK
        string name
        integer price
        string image
        text description
        timestamp created_at
        timestamp updated_at
    }
    seasons {
        bigint id PK
        string name
        timestamp created_at
        timestamp updated_at
    }
    product_season {
        bigint id PK
        bigint product_id FK
        bigint season_id FK
        timestamp created_at
        timestamp updated_at
    }
    products ||--o{ product_season : "has"
    seasons ||--o{ product_season : "has"
```

## URL

- 開発環境：http://localhost/