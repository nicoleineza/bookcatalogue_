<?php
include '../settings/connection.php';
include '../settings/core.php';
$userID = $_SESSION['user_id'];

// Get the data from the AJAX request

$categoryID = $_POST['categoryID'];
$isChecked = $_POST['isChecked'];
$bookID = $_POST['bookID'];

// Prepare the query
if ($isChecked === 'true') {
    $query = "INSERT INTO bookcategories (UserID, BookID, CategoryID) VALUES (?, ?, ?)";
} else {
    $query = "DELETE FROM bookcategories WHERE UserID = ? AND BookID = ? AND CategoryID = ?";
}

$stmt = $connection->prepare($query);
$stmt->bind_param("iii", $userID, $bookID, $categoryID);

// Execute the query
if ($stmt->execute()) {
    echo "Category updated successfully";
} else {
    echo "Error updating category: " . $stmt->error;
}

$stmt->close();
