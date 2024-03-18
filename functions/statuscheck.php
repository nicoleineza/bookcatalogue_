<?php
include '../settings/connection.php';

// SQL query to fetch the book details
$query = "SELECT Cover, Author, Title, ISBN, PublicationDate, `Description` FROM books WHERE BookID = ?";

if ($stmt = $connection->prepare($query)) {
    $stmt->bind_param("i", $bookID);

    $stmt->execute();

    // Bind the result variables
    $stmt->bind_result($cover, $author, $title, $isbn, $publicationDate, $description);
    $stmt->fetch();
    $stmt->close();
}
// Fetch the CategoryID for the book and user
$query = "SELECT CategoryID FROM bookcategories WHERE UserID = ? AND BookID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("ii", $userID, $bookID);
$stmt->execute();
$result = $stmt->get_result();
$shelfCategoryID = $result->fetch_assoc()['CategoryID'] ?? 'None'; // Default to 'None' if no category is set
$stmt->close();

// Define the status categories
$status = [
    'read' => "1",
    'wantToRead' => "2",
    'currentlyReading' => "3",
    'None' => "None"
];


// Function to check if the radio button should be checked
function isChecked($shelfCategoryID, $categoryID)
{
    return $shelfCategoryID == $categoryID ? "checked" : "";
}
