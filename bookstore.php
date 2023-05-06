<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get values from form
  $book_name = $_POST['book_name'];
  $book_description = $_POST['book_description'];
  $isbn = $_POST['isbn'];
  $author = $_POST['author'];
  $release_date = $_POST['release_date'];

  // Insert values into database
  $sql = "INSERT INTO books (book_name, book_description, isbn, author, release_date)
  VALUES ('$book_name', '$book_description', '$isbn', '$author', '$release_date')";

  if ($conn->query($sql) === TRUE) {
    echo "Book added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Check if download CSV is requested
if (isset($_GET['download'])) {
  // Set headers for CSV file
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=books.csv');

  // Open a file pointer
  $output = fopen('php://output', 'w');

  // Get books from database
  $sql = "SELECT * FROM books";
  $result = $conn->query($sql);

  // Write column headers to CSV file
  fputcsv($output, array('Book Name', 'Book Description', 'ISBN', 'Author', 'Release Date'));

  // Write rows to CSV file
  while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
  }

  // Close file pointer
  fclose($output);
}

// Check if search is requested
if (isset($_GET['search'])) {
  // Get search query from URL
  $isbn = $_GET['isbn'];

  // Get book from database
  $sql = "SELECT * FROM books WHERE isbn='$isbn'";
  $result = $conn->query($sql);

  // Display book information
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Book Name: " . $row['book_name'] . "<br>";
    echo "Book Description: " . $row['book_description'] . "<br>";
    echo "ISBN: " . $row['isbn'] . "<br>";
    echo "Author: " . $row['author'] . "<br>";
    echo "Release Date: " . $row['release_date'] . "<br>";
  } else {
    echo "Book not found";
  }
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bookstore</title>
</head>
<body>
  <h1>Bookstore</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Book Name: <input type="text" name="book_name"><br>
    Book Description: <input type="text" name="book_description"><br>
    ISBN: <input type="text" name="isbn"><br>
    Author: <input type="text" name="author"><br>
    Release Date: <input type="date" name="release_date"><br>
    <input type="submit" value="Add Book">
  </form>
  <br>
  <a href="bookstore.php?download=csv">Download CSV</a>
  <br>
  <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Search Book by ISBN: <input type="text" name="isbn"><br>
    <input type="submit" value="Search">
  </form>
</body>
</html>
