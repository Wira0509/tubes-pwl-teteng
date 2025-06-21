## Deskripsi Tim

Anggota Kelompok 8 :

- Salwa Halila 241402027, Peran : 
- Aldrik Noel Sianipar 241402049, Peran :
- Leondo Admiral Purba 241402053, Peran :
- Rafi Andara Nasution 241402095, Peran :
- Wira Hari Pratama 241402111, Peran :
- Yosia Marcel Koreshy 241402114, Peran : 

## Deskripsi Aplikasi

Teteng Finance adalah sebuah aplikasi web yang berfungsi untuk membantu individu, pengusaha mikro, dan bisnis skala kecil dalam mengelola keuangan mereka secara efektif dengan menawarkan solusi pencatatan keuangan praktis. Solusi ini memudahkan pelacakan pemasukan-pengeluaran, serta pengorganisasian transaksi secara langsung.

## Deskrispi Modul Fitur

- ### Login & Register
Pengguna harus mendaftarkan diri terlebih dahulu di register page dan masuk melalui login page agar bisa mengakses halaman utama.
- ### Level User
Membagi hak akses web menjadi dua yaitu user dan admin
- ### Hash Password
Menyimpan sandi ke database dengan mengubahnya menjadi karakter acak agar tidak terjadi hal yang tidak diinginkan.
- ### Dashboard User
User dapat melihat statistik keuangan nya dari halaman dashboard sepeti seberapa banyak pemasukan dan pengeluaran nya pada bulan itu.
- ### Filtering
Menampilkan data sesuai dengan keinginan user.
- ### Analisis Keuangan
Menampilkan data berupa grafik.
- ### CRUD
Memberikan akses agar user ataupun admin bisa membuat (Create), membaca (Read), memperbaharui (Update), dan menghapus (Delete) data-data yang ada di web tersebut jika memungkinkan.
- ### Download Laporan 
Riwayat Transaksi pemasukan dan pengeluaran dapat didownload berupa file .pdf atau spreadsheet.

## Teknologi Yang Dipakai

- ### Laravel 12
- ### Github
- ### MySQL
- ### Laragon
- ### VSCode
- ### Bootstrap
- ### Tailwind

## Library Yang Dipakai

- ### Laravel Breeze
- ### Laravel Filament
- ### Laravel Trend
- ### Laravel Dompdf
- ### MaatWebsite Excel
- ### Joaopaulo Filament Edit Profile

## Tata Cara Menjalankan Aplikasi

1. Salin link repo ini https://github.com/Wira0509/tubes-pwl-teteng.git
2. Buka VSCode
3. Pergi ke bagian terminal yang ada di vscode, pastikan direktori nya sudah sesuai (jika pengguna laragon berada pada folder www, dan jika pengguna xampp berada pada folder htdocs)
4. jalankan perintah git clone https://github.com/Wira0509/tubes-pwl-teteng.git untuk menduplikasi proyek dari GitHub ke komputer/laptop anda
5. Buat file .env dengan perintah cp .env.example .env, masuk kedalam file .env yang sudah dibuat tadi
6. Pada line 24-28 silahkan blok kode tersebut dan tekan ctrl+/ agar menguncomment kode tersebut.
7. Pada line 5 ganti app_url menjadi http://127.0.0.1:8000
9. Jalankan perintah composer install untuk menginstal semua package yang dibutuhkan proyek, laravel menggunakan composer sebagai depedency manager.
10. Laravel membutuhkan application key agar enskripsi befungsi dengan baik, jalankan perintah php artisan key:generate
13. Jalankan perintah php artisan migrate agar tabel-tabel yang diperlukan terinstall didatabase.
14. Jalankan perintah php artisan storage:link untuk membuat symbolic link (tautan simbolis) antara direktori public/storage dan storage/app/public
15. Jalankan perintah php artisan db:seed --class=CategorySeeder dan php artisan db:seed --class=AdminUserSeeder
16. Jalankan npm install dan npm run dev
17. Terakhir jalankan perintah php artisan serve agar diarahkan ke sebuah link yang bisa dibuka di website untuk mengakses web ini.
