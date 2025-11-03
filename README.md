Proyek project-mvc
Cara Pakai di Laragon
Klik kanan icon Laragon → Menu → www → project-mvc

Atau buat Pretty URL (jika langkah 1 gagal):

Klik kanan icon Laragon
Menu → Apache → sites-enabled
Buat file project-mvc.conf:
<VirtualHost *:80>
       DocumentRoot "C:/laragon/www/project-mvc/public"
       ServerName project-mvc.test
       ServerAlias *.project-mvc.test
       <Directory "C:/laragon/www/project-mvc/public">
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
Restart Apache dari Laragon

Akses:

   http://project-mvc.test
