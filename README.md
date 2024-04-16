# NIAWeb

## Dependency

- Laravel
- PHP 7.1
- MySQL 5.7
- Docker

## 步驟

啟動 Container

```bash
docker compose up -d
```

如果是第一次跑這個專案，可能會需要跑以下指令更新 Laravel 的相依套件。

```bash
docker compose exec app composer install
```

進入 Container

```bash
docker compose exec app bash
```

Create Table

```bash
php artisan migrate:refresh --seed
```

瀏覽器啟動 [http://localhost:8080](http://localhost:8080)，就可以看到 Laravel 的首頁了。

## Note

改好 CSS 之後，記得要重新 build 一次。

```bash
export NODE_OPTIONS=--openssl-legacy-provider
npm run production
```

## Deploy Server

```bash
git clone https://github.com/peter0512lee/NIAWeb
cd NIAWeb
copy .env.example .env
docker compose up -d
docker compose exec app composer install
docker compose exec app bash
php artisan migrate:refresh --seed
```

## Reference

- [Laravel](https://laravel.com/)
- [docker restart always](https://stackoverflow.com/questions/43671482/how-to-run-docker-compose-up-d-at-system-start-up)
