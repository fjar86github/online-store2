-- Membuat database
CREATE DATABASE IF NOT EXISTS online_store;

-- Menggunakan database
USE online_store;

-- Membuat user baru
CREATE USER IF NOT EXISTS 'store_user'@'%' IDENTIFIED BY 'password123';

-- Memberikan hak akses ke user
GRANT ALL PRIVILEGES ON online_store.* TO 'store_user'@'%';

-- Mengaktifkan perubahan hak akses
FLUSH PRIVILEGES;

-- Membuat tabel produk
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Membuat tabel pesanan
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
);
