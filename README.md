
## アプリ起動
```
$ docker-compose up -d --build
```
## web-appの設定
```
$ docker-compose exec web-app composer install
$ ç
$ docker-compose exec web-app php artisan key:generate
$ docker-compose exec web-app php artisan migrate
```
## npmの設定
```
$ docker-compose run node npm install
$ docker-compose run node npm run dev
```

## 動作確認
http://localhost:82/

