<?php
include '../settings/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: ../views/login.php");
    exit(); // Terminate script
}

// Query to get the book covers the user has read
$user_id = $_SESSION['user_id']; 


// Query to get the book covers the user has read

$sql = "SELECT u.user_id, u.firstname, u.lastname, COUNT(bc.BookID) AS books_read
FROM Users u
LEFT JOIN userbooks ub ON u.user_id = ub.UserID
LEFT JOIN bookcategories bc ON ub.BookID = bc.BookID
LEFT JOIN categories c ON bc.CategoryID = c.CategoryID
WHERE c.Category = 'Currently Reading' AND user_id = $user_id
GROUP BY u.user_id";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $currently_reading = $row["books_read"];
    }
} else {
    $currently_reading = 0;
}

$connection->close();
?>





