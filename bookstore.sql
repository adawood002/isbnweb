CREATE DATABASE bookstore;

USE bookstore;

CREATE TABLE books (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  book_name VARCHAR(30) NOT NULL,
  book_description VARCHAR(255) NOT NULL,
  isbn VARCHAR(13) NOT NULL,
  author VARCHAR(30) NOT NULL,
  release_date DATE NOT NULL
);
