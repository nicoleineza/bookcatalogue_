<?php
include ("../settings/connection.php");

// Function to add a new story to the database
function addStory($title, $content, $author) {
    global $conn;
    
    $stmt = $conn->prepare("INSERT INTO stories (title, content, author) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $author);
    
    if ($stmt->execute() === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    
    if (addStory($title, $content, $author)) {
        echo "Story added successfully.";
    } else {
        echo "Error adding story.";
    }
}