<?php
include ('../settings/connection.php');

$query = "SELECT CategoryID FROM bookcategories WHERE UserID = ? AND BookID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("ii", $userID, $bookID);
$stmt->execute();
$result = $stmt->get_result();
$shelfCategoryID = $result->fetch_assoc()['CategoryID'] ?? 'None'; 
$stmt->close();

// Define the status categories
$status = [
    'read' => "1",
    'wantToRead' => "2",
    'currentlyReading' => "3",
    'None' => "None" 
];


function isChecked($shelfCategoryID, $categoryID) {
    return $shelfCategoryID == $categoryID ? "checked" : "";
}
