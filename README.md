# Ethis-test

## Installation Local Deploy

- Jalankan perintah 
```bash
composer install
```
- Ganti nama file .env.example ke .env

- Jalankan perintah 
```bash 
php artisan key:generate
```
- import database news.sql dan ubah DB_DATABASE=laravel ke DB_DATABASE=news pada file .env
```bash 
#atau jalankan perintah 
php artisan migrate --seed
```
- buat token keys dengan cara menjalankan perintah
```bash
php artisan passport:install
```
- tearkhir jalankan perintah 
```bash 
php artisan serve
```
