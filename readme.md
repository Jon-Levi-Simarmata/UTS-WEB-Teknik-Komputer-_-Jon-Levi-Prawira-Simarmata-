# My Store – UTS Praktek Pemrograman Web 2

Aplikasi toko online sederhana (gadget & elektronik) berbasis **PHP Native + MySQL** dengan arsitektur **MVC**.
Pada tahap UTS ditambahkan **Login Admin** dan **Dashboard Admin** untuk mengelola produk (CRUD).

- **Mata Kuliah** : Praktek Pemrograman Web 2
- **Dosen** : Primatua Sitompul, M.Kom
- **Nama / Prodi** : _(Jon Levi Prawira Simarmata)_ / Teknik Komputer

## Fitur
1. **Halaman Publik** – daftar produk + pencarian (nama/kategori).
2. **Login Admin** – autentikasi dengan session & `password_hash` (bcrypt).
3. **Dashboard Admin** – ringkasan total produk, stok, kategori, nilai aset, dan 5 produk terbaru.
4. **CRUD Produk**
   - **Create** – tambah produk baru
   - **Read** – daftar produk + search
   - **Update** – edit produk yang sudah ada
   - **Delete** – hapus produk discontinued (dengan konfirmasi, via POST)
5. **25 data dummy** produk (Smartphone, Laptop, Aksesoris, Audio, Wearable, Gaming).

## Teknologi
PHP 8+, MySQL/MariaDB (PDO + prepared statement), Bootstrap 5 & Bootstrap Icons (CDN), Apache (XAMPP).

## Struktur Folder (MVC)
```
my-store/
├── index.php                 # Front controller
├── .htaccess                 # URL rewrite
├── config/
│   └── config.php            # BASE_URL & konfigurasi database
├── app/
│   ├── core/                 # App (router), Controller, Database
│   ├── controllers/          # HomeController, AuthController, AdminController, ProductController
│   ├── models/               # User, Product
│   └── views/
│       ├── layouts/          # header, footer, admin_nav, admin_end
│       ├── home/             # halaman publik
│       ├── auth/             # login
│       ├── admin/            # dashboard
│       └── product/          # index, create, edit, _form
├── database/
│   └── mystore.sql           # struktur tabel + data dummy
├── public/css/style.css
├── screenshoot/              # screenshot hasil pekerjaan
└── readme.md
```

## Cara Menjalankan
1. Copy folder `my-store` ke `C:/xampp/htdocs/`.
2. Jalankan **Apache** dan **MySQL** di XAMPP.
3. Buka phpMyAdmin → **Import** file `database/mystore.sql`.
4. Sesuaikan `config/config.php` bila user/password MySQL berbeda.
5. Buka `http://localhost/my-store/`.
6. Login admin: `http://localhost/my-store/auth/login`

| Username | Password   |
|----------|------------|
| admin    | admin123   |

## Routing
| URL | Fungsi |
|-----|--------|
| `/` | Beranda publik |
| `/auth/login` | Form login |
| `/auth/logout` | Logout |
| `/admin/dashboard` | Dashboard admin |
| `/product` | Daftar produk |
| `/product/create` | Form tambah produk |
| `/product/edit/{id}` | Form edit produk |
| `/product/delete/{id}` | Hapus produk (POST) |

## Screenshot
Lihat folder `screenshoot/`:
- `01-login.png`
- `02-dashboard.png`
- `03-create-produk.png`
- `04-update-produk.png`
- `05-delete-produk.png`
