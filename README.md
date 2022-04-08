# リアルタイムお絵描き(Beta版)

||||
|--|--|--|
|Laravel|8.83.6|php8.0.17|
|Vue|3.2.31||
|MySQL|8.0||
|NGINX|1.21.6||

Pusher
Laravel Echo

## 環境構築

### git cloneしてきて
```
$ docker compose up -d
```

```
$ docker-compose exec php bash
```

```
# composer install
# php artisan key:generate
# php artisan migrate
```

```
# npm install && npm run dev
```

## ENV_FILE

`docker-compose.yml`と同じ階層に
```
$ touch .env
```

中身はこんな感じ
お好みの設定で👍
```
DB_PORT=
MYSQL_DATABASE=
MYSQL_USER=
MYSQL_PASSWORD=
MYSQL_ROOT_PASSWORD=
TZ=Asia/Tokyo
```
