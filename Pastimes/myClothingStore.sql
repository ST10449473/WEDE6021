CREATE DATABASE IF NOT EXISTS clothingStore;
USE clothingStore;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    category VARCHAR(50),
    image VARCHAR(255)
);

INSERT INTO products (name, price, category, image) VALUES
('T-Shirt', 199.99, 'Men', 'tshirt.jpg'),
('Dress', 349.99, 'Women', 'dress.jpg'),
('Jacket', 599.99, 'Men', 'jacket.jpg'),
('Sneakers', 799.99, 'Unisex', 'sneakers.jpg');