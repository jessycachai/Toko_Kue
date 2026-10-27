-- Database schema for toko_kue

CREATE DATABASE IF NOT EXISTS toko_kue;
USE toko_kue;

-- Table for categories
CREATE TABLE kategori (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL UNIQUE
);

-- Table for products
CREATE TABLE product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    kategori_id INT NOT NULL,
    nama VARCHAR(255) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    foto VARCHAR(255),
    detail TEXT,
    ketersediaan_stok ENUM('tersedia', 'habis') DEFAULT 'tersedia',
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE CASCADE
);

-- Table for users (admin login)
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert some sample data (optional)
INSERT INTO kategori (nama) VALUES ('Cakes'), ('Breads'), ('Pastries');

INSERT INTO product (kategori_id, nama, harga, foto, detail, ketersediaan_stok) VALUES
(1, 'Chocolate Cake', 50000.00, 'chocolate_cake.jpg', 'Delicious chocolate cake', 'tersedia'),
(1, 'Vanilla Cake', 45000.00, 'vanilla_cake.jpg', 'Classic vanilla cake', 'tersedia'),
(2, 'White Bread', 20000.00, 'white_bread.jpg', 'Fresh white bread', 'tersedia');

-- Insert a default admin user (password: admin123)
INSERT INTO users (username, password) VALUES ('admin', '$2y$10$F/Tn5jE6TOvIm7E2JgShouzcQvXqm0ow.9nf2o.k1/pNP3O4t7WJe');