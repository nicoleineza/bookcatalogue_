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

$sql = "SELECT COUNT(DISTINCT Genre) AS distinct_genres_read
FROM books
WHERE BookID IN (
    SELECT BookID
    FROM userbooks
    WHERE UserID = $user_id
);
";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $genres = $row["distinct_genres_read"];
    }
} else {
    $genres = 0;
}

$connection->close();
?>





