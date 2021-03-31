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
## Informasi Tambahan
User tidak dapat mengakses masuk aplikasi dan notiffikasi tidak akan muncul jika user belum memverifikasi email. Untuk membuat aplikasi mengirim ke semua user kecuali pembuat post ubah pada file app\Observers\NewsObserver.php
