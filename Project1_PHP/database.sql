CREATE DATABASE IF NOT EXISTS demo_db;
USE demo_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price VARCHAR(50) NOT NULL
);

INSERT INTO products (name, price) VALUES 
('Laptop Gaming', '20.000.000 VND'),
('Chuột không dây', '500.000 VND');