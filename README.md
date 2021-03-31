# Ethis-test

## Installation

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
- tearkhir jalankan perintah 
```bash 
php artisan serve
```
