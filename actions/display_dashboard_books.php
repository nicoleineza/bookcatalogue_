<?php
include '../settings/connection.php';
//include '../settings/core.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: ../views/login.php");
    exit(); // Terminate script
}

// Query to get the book covers the user has read
$user_id = $_SESSION['user_id']; 


// Query to get the book covers the user has read

$sql = "SELECT books.Cover FROM books INNER JOIN userbooks ON books.BookID = userbooks.BookID 
WHERE userbooks.UserID = $user_id";

$result = $connection->query($sql);

if ($result === false) {
    // Handle query error
    die("Error executing query: " . $connection->error);
}
?>




