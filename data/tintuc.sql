USE TINTUC

CREATE TABLE users (
    id  INT AUTO_INCREMENT  PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT NOT NULL -- 0: người dùng, 1: quản trị viên
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
tempdb

CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO users (username, password, role) VALUES
('admin', 'adminpassword', 1),
('user1', 'user1password', 0),
('user2', 'user2password', 0);

INSERT INTO categories (name) VALUES
('Technology'),
('Science'),
('Health'),
('Travel');


INSERT INTO news (title, content, image, created_at, category_id) VALUES
('Tech News', 'This is a technology news content.', './images/tech.jpg', NOW(), 1),
('Science Discovery', 'This is a science news content.', './images/science.jpg', NOW(), 2),
('Health Tips', 'This is a health news content.', './images/health.jpg', NOW(), 3),
('Travel Guide', 'This is a travel news content.', './images/travel.jpg', NOW(), 4);