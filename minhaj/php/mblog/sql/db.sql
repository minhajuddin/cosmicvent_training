-- SQL to create the mblog database

CREATE DATABASE mblog;
USE mblog;
CREATE TABLE posts(id INT AUTO_INCREMENT, title VARCHAR(200) NOT NULL, 
content VARCHAR(1000) NOT NULL, author VARCHAR(50) NOT NULL, created_on DATE NOT NULL, PRIMARY KEY(id));
