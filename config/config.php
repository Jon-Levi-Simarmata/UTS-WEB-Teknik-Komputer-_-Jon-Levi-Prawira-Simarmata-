<?php
// Base URL otomatis (contoh: http://localhost/my-store)
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$path   = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
define('BASE_URL', $scheme . '://' . $_SERVER['HTTP_HOST'] . $path);

// Konfigurasi database (sesuaikan dengan XAMPP kamu)
define('DB_HOST', 'localhost');
define('DB_NAME', 'mystore');
define('DB_USER', 'root');
define('DB_PASS', '');
