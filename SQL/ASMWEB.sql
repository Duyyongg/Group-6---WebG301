CREATE DATABASE if NOT EXISTS ShrekJuices;
USE ShrekJuices;

CREATE TABLE Admins (
    AdminID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50),
    Hash_password VARCHAR(255),  
    Email VARCHAR(100),
    Role VARCHAR(50)
);

INSERT INTO Admins (Username, Hash_password, Email, Role) VALUES
('phutrong123', SHA1('Abc123'), 'phutrong@gmail.com', 'Manager'),
('Duyto', SHA1('Abc123'), 'toduy11002@gmail.com', 'Staff'),
('toanvu', SHA1('Abc123'), 'toanvu2032002@gmail.com', 'Staff');




CREATE TABLE customers (
   user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    address VARCHAR(255),
    phone_number VARCHAR(20),
    gender ENUM('Male', 'Female', 'Other')
    
);
CREATE TABLE Categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL,
    image VARCHAR(255) NOT NULL
);

INSERT INTO categories (category_name, image) VALUES
('Vegetable juice', 'https://www.fruitjuicefocus.com/wp-content/uploads/2019/09/detox-vegetable-juice1.jpg'),
('Smoothie', 'https://cdn.tgdd.vn/Files/2018/12/09/1136623/smoothie-la-gi-mot-vau-cong-thuc-che-bien-smoothie-don-gian-tai-nha-7.jpg'),
('Juice', 'https://juicernet.com/wp-content/uploads/2022/08/D329rh7FjDLbSPYJExtxXtExVdqCwutT1661951555.jpg');

CREATE TABLE Products (
    product_id INT PRIMARY KEY NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    category_id INT,
    price DECIMAL(10, 2),
    size TEXT,
    ingredients VARCHAR(255),
    image_url VARCHAR(255), 
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

INSERT INTO Products (product_id, product_name, category_id, price, size, ingredients, image_url) VALUES
(1, 'Green Juice', 1, 4.99, '500ml', 'Kale, Spinach, Green Apple, Lime, Ginger', 'https://hips.hearstapps.com/hmg-prod/images/green-detox-juice-with-ginger-and-mint-in-glasses-royalty-free-image-1590670270.jpg'),
(2, 'Berry Smoothie', 2, 5.99, '450ml', 'Mixed Berries, Banana, Greek Yogurt, Honey', 'https://simple-veganista.com/wp-content/uploads/2017/07/mixed-berry-yogurt-smoothie-2.jpg'),
(3, 'Mango Juice', 3, 3.99, '500ml', 'Fresh Mango, Ice, Water, Sugar', 'https://www.crazyvegankitchen.com/wp-content/uploads/2023/06/mango-juice-683x1024.jpg');


CREATE TABLE juices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    juice_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO juices (juice_name, price, description) VALUES
('Green Goddess', 4.99, 'A refreshing blend of kale, spinach, apple, and lemon.'),
('Berry Blast', 5.49, 'An antioxidant-rich mix of berries and pomegranate.'),
('Tropical Twist', 4.49, 'A sweet and tangy combination of pineapple, mango, and orange.');
