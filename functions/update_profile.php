<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /bookcatalogue_/views/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include ("../settings/connection.php");

    $newValue = $_POST['newValue'];
    $attribute = $_POST['attribute'];
    $userId = $_SESSION['user_id'];

    $newValue = mysqli_real_escape_string($connection, $newValue);
    $attribute = mysqli_real_escape_string($connection, $attribute);

    $update_query = "UPDATE Users SET $attribute = '$newValue' WHERE user_id = $userId";
    $update_result = $connection->query($update_query);

    if ($update_result) {
      
        exit();
    } else {
        
        http_response_code(500);
        exit();
    }

    $connection->close();
} else {
    header("Location: bookcatalogue_/views/landing.php");
    exit();
}
?>
