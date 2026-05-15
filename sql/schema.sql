-- MSTechPC Database Schema

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('customer', 'admin') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Categories Table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL
) ENGINE=InnoDB;

-- Products Table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(200) NOT NULL,
    slug VARCHAR(200) UNIQUE NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    short_description TEXT,
    long_description TEXT,
    image_url VARCHAR(255),
    is_featured BOOLEAN DEFAULT FALSE,
    stock_status ENUM('in_stock', 'out_of_stock', 'on_order') DEFAULT 'in_stock',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Components Table (for PC Configurator)
CREATE TABLE IF NOT EXISTS components (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('cpu', 'gpu', 'ram', 'ssd', 'psu', 'case', 'cooler') NOT NULL,
    name VARCHAR(200) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    performance_score INT DEFAULT 0, -- Score to calculate FPS estimations
    is_active BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB;

-- Orders Table
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_price DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'paid', 'shipped', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Order Items Table
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Reviews Table
CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating TINYINT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Blog Posts Table
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content LONGTEXT NOT NULL,
    author_id INT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Sample Data
INSERT INTO categories (name, slug) VALUES
('Gaming', 'gaming'),
('Streaming', 'streaming'),
('Workstation', 'workstation'),
('Office', 'office');

INSERT INTO products (category_id, name, slug, price, short_description, is_featured, image_url) VALUES
(1, 'MSTech Venom Gen.5', 'mstech-venom-gen5', 8499.00, 'Bestia do 4K z RTX 5070', 1, 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&q=80&w=600'),
(3, 'MSTech Creator Pro', 'mstech-creator-pro', 12299.00, 'Stacja robocza dla profesjonalistów', 1, 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&q=80&w=600'),
(1, 'MSTech Swift Start', 'mstech-swift-start', 3499.00, 'Idealny start w świat gamingu', 1, 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=600');

INSERT INTO components (type, name, price, description, performance_score) VALUES
('cpu', 'Intel Core i9-14900K', 2899.00, '24 rdzenie, do 6.0 GHz', 95),
('cpu', 'AMD Ryzen 7 7800X3D', 1899.00, 'Król gamingu z 3D V-Cache', 92),
('cpu', 'Intel Core i5-14600K', 1450.00, 'Świetny balans wydajności', 75),
('gpu', 'NVIDIA GeForce RTX 4090', 8999.00, 'Bezkompromisowa wydajność 4K', 100),
('gpu', 'NVIDIA GeForce RTX 4070 Ti Super', 3999.00, 'Idealna do 1440p i 4K', 80),
('gpu', 'AMD Radeon RX 7800 XT', 2499.00, 'Najlepszy stosunek ceny do wydajności', 70);

SET FOREIGN_KEY_CHECKS = 1;
