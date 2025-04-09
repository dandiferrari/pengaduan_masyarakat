# Aplikasi Pengaduan Masyarakat

Sistem pengaduan masyarakat berbasis web menggunakan Laravel, Inertia.js, dan Vue 3. Proyek ini menyediakan fitur otentikasi, peran pengguna (`admin` dan `masyarakat`), dan formulir pengaduan secara online.

## 🚀 Fitur Utama
- Login & Registrasi dengan role `admin` dan `masyarakat`
- Halaman dashboard untuk admin
- Formulir pengaduan untuk masyarakat
- Middleware autentikasi & otorisasi per role
- SPA dengan Inertia.js & Vue 3

---

## 📦 Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

### 1. Clone Repository
```bash
git clone https://github.com/namamu/pengaduan-masyarakat.git
cd pengaduan-masyarakat

composer install

npm install

cp .env.example .env

php artisan key:generate

DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate --seed

php artisan serve

npm run dev

Admin

Email: admin@example.com

Password: password

Masyarakat

Email: user@example.com

Password: password