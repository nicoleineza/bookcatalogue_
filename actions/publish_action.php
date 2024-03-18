<?php
include ("../settings/connection.php");
include '../settings/core.php';

// Function to add a new story to the database
function addStory($user_id, $year, $title, $content) {
    global $connection;
    
    $stmt = $connection->prepare("INSERT INTO Publishing (user_id, year_published, book_title, content) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $user_id, $year, $title, $content);
    
    if ($stmt->execute() === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $year = date("Y"); // Set the year to the current year
    $title = $_POST['title'];
    $content = $_POST['content'];
   
    if (addStory($user_id, $year, $title, $content)) {
        echo "Story added successfully.";
    } else {
        echo "Error adding story.";
    }
}
