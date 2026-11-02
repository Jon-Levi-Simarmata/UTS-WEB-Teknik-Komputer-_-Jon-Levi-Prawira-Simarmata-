-- Database My Store (UTS Praktek Pemrograman Web 2)
CREATE DATABASE IF NOT EXISTS mystore CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mystore;

DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  category VARCHAR(60) NOT NULL,
  price DECIMAL(12,0) NOT NULL DEFAULT 0,
  stock INT NOT NULL DEFAULT 0,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Admin default: username = admin | password = admin123
INSERT INTO users (name, username, password) VALUES
('Administrator', 'admin', '$2b$12$G8bTizXN.fbuy4LOz7G8TupCnW/sj/SY13LvIMIzJnFKZhMkRGOM2');

INSERT INTO products (name, category, price, stock, description) VALUES
('iPhone 15 128GB', 'Smartphone', 13999000, 15, 'Smartphone flagship Apple dengan chip A16 Bionic.'),
('Samsung Galaxy S24', 'Smartphone', 12499000, 20, 'Layar Dynamic AMOLED 120Hz dengan Galaxy AI.'),
('Xiaomi Redmi Note 13', 'Smartphone', 2999000, 40, 'Kamera 108MP dan baterai 5000mAh.'),
('Oppo Reno 11', 'Smartphone', 6499000, 18, 'Desain tipis dengan kamera portrait 50MP.'),
('Realme C55', 'Smartphone', 2199000, 35, 'HP entry level dengan fast charging 33W.'),
('ASUS VivoBook 14', 'Laptop', 7999000, 12, 'Laptop tipis Intel Core i5, RAM 8GB, SSD 512GB.'),
('Acer Aspire 5', 'Laptop', 8499000, 10, 'Laptop harian Ryzen 5 dengan layar Full HD.'),
('Lenovo IdeaPad Slim 3', 'Laptop', 6999000, 14, 'Laptop pelajar Intel Core i3 Gen 12.'),
('MacBook Air M2', 'Laptop', 16999000, 6, 'Chip Apple M2, baterai tahan hingga 18 jam.'),
('HP Pavilion 15', 'Laptop', 10499000, 8, 'Laptop multimedia Core i7, RAM 16GB.'),
('Logitech M331 Silent Mouse', 'Aksesoris', 229000, 60, 'Mouse wireless dengan klik senyap.'),
('Keyboard Mechanical Rexus', 'Aksesoris', 499000, 25, 'Keyboard mechanical switch blue RGB.'),
('Flashdisk SanDisk 64GB', 'Aksesoris', 89000, 100, 'Flashdisk USB 3.0 kecepatan tinggi.'),
('Powerbank Anker 10000mAh', 'Aksesoris', 349000, 45, 'Powerbank ringkas dengan fast charging.'),
('Charger GaN 65W', 'Aksesoris', 299000, 30, 'Charger USB-C multi port untuk laptop dan HP.'),
('Sony WH-1000XM5', 'Audio', 5499000, 9, 'Headphone noise cancelling terbaik di kelasnya.'),
('JBL Flip 6', 'Audio', 1999000, 22, 'Speaker bluetooth waterproof IP67.'),
('Xiaomi Buds 4 Pro', 'Audio', 1699000, 28, 'TWS dengan Active Noise Cancellation.'),
('Samsung Galaxy Buds2', 'Audio', 1299000, 26, 'Earbuds nirkabel dengan suara jernih.'),
('Edifier R1280DB', 'Audio', 1799000, 12, 'Speaker bookshelf aktif dengan bluetooth.'),
('Apple Watch SE', 'Wearable', 4299000, 11, 'Smartwatch dengan fitur kesehatan lengkap.'),
('Xiaomi Smart Band 8', 'Wearable', 499000, 50, 'Smartband dengan layar AMOLED 1.62 inci.'),
('Samsung Galaxy Watch 6', 'Wearable', 3999000, 13, 'Smartwatch dengan sensor body composition.'),
('PlayStation 5 Slim', 'Gaming', 9499000, 7, 'Konsol game generasi terbaru dari Sony.'),
('Nintendo Switch OLED', 'Gaming', 4999000, 10, 'Konsol hybrid dengan layar OLED 7 inci.');
