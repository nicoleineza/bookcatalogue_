<?php

include '../settings/connection.php';
// Function to fetch user data from the database
function getUserData() {
    global $servername, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch user data
    $sql = "SELECT * FROM Users WHERE user_id = 1"; // Assuming user_id 1 for demonstration

    $result = $conn->query($sql);

    // Check if query was successful
    if ($result && $result->num_rows > 0) {
        // Fetch user data as an associative array
        $user = $result->fetch_assoc();
    } else {
        // User data not found
        $user = null;
    }

    // Close connection
    $conn->close();

    return $user;
}

// Fetch user data
$user = getUserData();
?>
