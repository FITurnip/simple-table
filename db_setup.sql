CREATE DATABASE content_db;
USE content_db;
CREATE TABLE contents (
id INT AUTO_INCREMENT PRIMARY KEY,
content TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
EXIT;