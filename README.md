# Laravel8 + Vue3 環境構築セット

||||
|--|--|--|
|Laravel|8.83.6|php8.0.17|
|Vue|3.2.31||
|MySQL|8.0||
|NGINX|1.21.6||

## 環境構築

### Dockerfile, docker-compose.ymlだけ使いたい場合

```
$ docker-compose up -d
```

bashで入ってlaravel8のインストールする
```
$ docker-compose exec php bash
```

多分`backend/laravel/laravel`になってるわ
階層上げといて! `backend/laravel`

```
# composer create-project laravel/laravel:^8.0 .
# npm install && npm run dev
```

```
# composer require laravel/ui
# php artisan ui vue --auth
# php artisan migrate
```

```
# npm install && npm run dev
```

### git cloneする場合
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
