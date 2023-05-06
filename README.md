# Bookstore Web App

This is a simple web app for a bookstore that allows users to add new books to a database, download a CSV file of all the stored books, and search for books by their ISBN number.

## Technologies Used
The web app was built using the following technologies:

PHP
HTML
SQL
JavaScript
Getting Started
To run the web app locally on your machine, you will need to have a web server installed, such as Apache, and a database server installed, such as MySQL.

Once you have these installed, you can follow these steps:

Clone the repository to your local machine.
Create a new database called "bookstore" in your MySQL server.
Import the "bookstore.sql" file in your "bookstore" database to create the "books" table.
Update the database credentials in the "db_config.php" file to match your local database settings.
Start your web server and navigate to the "bookstore.php" file in your browser.
## Features
Add Book
To add a new book to the database, fill out the form on the homepage with the book's information, including the book name, book description, ISBN, author, and release date, and click "Add Book". The book will be added to the database and you will be redirected to the homepage.

Download CSV
To download a CSV file of all the stored books, click the "Download CSV" link on the homepage. The CSV file will be downloaded to your local machine.

Search Book by ISBN
To search for a book by its ISBN number, fill out the form on the homepage with the book's ISBN number and click "Search". If a book with the specified ISBN number is found in the database, its information will be displayed on the homepage.
