# Kamus Indonesia
Tugas Final Project membuat kamus indonesia dari sumber website resmi KBBI dengan menerapkan metode web scraping.

## Prequisite
1. PC/Laptop/HP(Termux)
2. Nginx (Buat Web Server)
3. Mysql (Buat simpen data kata supaya gk request ulang ke KBBI)
4. PHP (gk perlu ditanya buat apa)
5. PHP-FPM (ini buat compiler karna pakai **NGINX**, apache gk dulu)
6. Bisa ngoding (kalau gk bisa nanti gk ngerti)


## Usage
1. Edit NGINX config dulu buat hosting ke domain (internet/local) contoh:
```nginx
    #
    server {
        listen 80;
        server_name kamus-indonesia.test;

        # buat baca file repony
        root "repo-path/kamus-indonesia"; 
        # ini subconfig, agar project lebih rapih dan ningkatin keamanan web server-nya
        include "repo-path/kamus-indonesia/nginx.conf"; 
    }
```
2. Import dump SQL yang udah tersedia di repo (coming soon)
3. Jalanin Nginx, PHP-FPM dan Mysql
4. Enjoy

<center>
<b>=== Selamat Mencoba ===</b>
</center>
   