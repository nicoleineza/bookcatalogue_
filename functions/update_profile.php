<?php
include '../settings/connection.php';
include'../functions/getuser.php';

// Function to fetch user data from the database
function getUserData($conn, $userId) {
    // SQL query to fetch user data
    $sql = "SELECT * FROM Users WHERE user_id = $userId";

    $result = $conn->query($sql);

    // Check if query was successful
    if ($result && $result->num_rows > 0) {
        // Fetch user data as an associative array
        $user = $result->fetch_assoc();
    } else {
        // User data not found
        $user = null;
    }

    return $user;
}

// Fetch user data
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $user = getUserData($conn, $user_id);
} else {
    // Redirect or handle the case where user is not logged in
    header("Location: login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an empty array to store the updates
    $updates = array();

    // Check if each attribute is being updated and add it to the $updates array
    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
        $updates[] = "firstname='$firstname'";
    }
    if (isset($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
        $updates[] = "lastname='$lastname'";
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $updates[] = "email='$email'";
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        $updates[] = "phone='$phone'";
    }
    // Add more conditions for other attributes you want to update

    // Construct the SQL query to update the user profile
    $sql = "UPDATE Users SET " . implode(", ", $updates) . " WHERE user_id = $user_id";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>
