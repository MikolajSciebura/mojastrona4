-- MSTechPC Production Schema

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('customer', 'admin') DEFAULT 'customer',
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    description TEXT
) ENGINE=InnoDB;

-- Products
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(200) NOT NULL,
    slug VARCHAR(200) UNIQUE NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    old_price DECIMAL(10, 2),
    short_description TEXT,
    long_description TEXT,
    specs JSON,
    benchmarks JSON,
    image_url VARCHAR(255),
    stock_count INT DEFAULT 0,
    is_featured BOOLEAN DEFAULT FALSE,
    seo_title VARCHAR(255),
    seo_description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Components (for PC Configurator)
CREATE TABLE IF NOT EXISTS components (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('cpu', 'gpu', 'ram', 'ssd', 'psu', 'case', 'cooler', 'mobo') NOT NULL,
    name VARCHAR(200) NOT NULL,
    brand VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    compat_data JSON, -- e.g. {"socket": "AM5", "wattage": 105}
    perf_score INT DEFAULT 0,
    image_url VARCHAR(255),
    stock_count INT DEFAULT 0
) ENGINE=InnoDB;

-- Saved Configurations
CREATE TABLE IF NOT EXISTS pc_configurations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    config_name VARCHAR(100),
    components JSON,
    total_price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Orders
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_number VARCHAR(20) UNIQUE,
    total_price DECIMAL(10, 2) NOT NULL,
    status ENUM('new', 'pending_payment', 'processing', 'shipped', 'completed', 'cancelled') DEFAULT 'new',
    payment_method VARCHAR(50),
    shipping_method VARCHAR(50),
    shipping_address TEXT,
    invoice_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Order Items
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price_at_purchase DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Wishlist
CREATE TABLE IF NOT EXISTS wishlist (
    user_id INT,
    product_id INT,
    PRIMARY KEY (user_id, product_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Blog
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content LONGTEXT NOT NULL,
    excerpt TEXT,
    image_url VARCHAR(255),
    author_id INT,
    category VARCHAR(50),
    seo_title VARCHAR(255),
    seo_description TEXT,
    is_published BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Sample Data
INSERT INTO categories (name, slug) VALUES
('Gaming', 'gaming'),
('Streaming', 'streaming'),
('Workstation', 'workstation'),
('Office', 'office'),
('Premium', 'premium');

INSERT INTO products (category_id, name, slug, price, short_description, is_featured, image_url, stock_count) VALUES
(1, 'MSTech Venom Gen.5', 'mstech-venom-gen5', 8499.00, 'Bestia do 4K z RTX 5070', 1, 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&q=80&w=600', 5),
(3, 'MSTech Creator Pro', 'mstech-creator-pro', 12299.00, 'Stacja robocza dla profesjonalistów', 1, 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&q=80&w=600', 2),
(5, 'MSTech Ultimate X', 'mstech-ultimate-x', 24999.00, 'Luksusowa wydajność bez kompromisów', 1, 'https://images.unsplash.com/photo-1547082299-de196ea013d6?auto=format&fit=crop&q=80&w=600', 1);

INSERT INTO components (type, name, price, perf_score, compat_data) VALUES
('cpu', 'Intel Core i9-14900K', 2899.00, 95, '{"socket": "LGA1700", "wattage": 125}'),
('cpu', 'AMD Ryzen 7 7800X3D', 1899.00, 92, '{"socket": "AM5", "wattage": 120}'),
('gpu', 'NVIDIA GeForce RTX 4090', 8999.00, 100, '{"wattage": 450}'),
('mobo', 'ASUS ROG MAXIMUS Z790', 2499.00, 0, '{"socket": "LGA1700"}'),
('mobo', 'MSI MAG B650 TOMAHAWK', 899.00, 0, '{"socket": "AM5"}');

-- Admin Account (password: admin123)
INSERT INTO users (name, email, password, role) VALUES
('Admin MSTech', 'admin@mstechpc.pl', '$2y$10$8v8XwK3n2B1T.qR.R.R.R.eY8v8XwK3n2B1T.qR.R.R.R.e', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
