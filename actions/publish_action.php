<?php
include ("../settings/connection.php");

// Function to add a new story to the database
function addStory($author, $year, $title, $content) {
    global $conn;
    session_start();
    $user_id=$_SESSION['user_id'];
    
    $stmt = $conn->prepare("INSERT INTO Publishing (user_id, year_published, book_title, content) VALUES ('user_id', ?, ?, ?)");
    $stmt->bind_param("iiss", $author, $year, $title, $content);
    
    if ($stmt->execute() === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


     $author = $_POST['user_id'];
     $year= $_POST['year_published'];
     $title = $_POST['book_title'];
     $content = $_POST['content'];
   
    
    if (addStory($author, $year, $title, $content)) {
        echo "Story added successfully.";
    } else {
        echo "Error adding story.";
    }
}