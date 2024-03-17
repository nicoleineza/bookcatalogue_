<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: ../bookcatalogue_/views/login.php");
    exit();
}

// Include database connection
include_once '../bookcatalogue_/settings/connection.php';

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Initialize variables to store goals
$annual_goal = 0;
$monthly_goal = 0;

// Fetch annual goal for the user
$sql_annual = "SELECT goal_value FROM Goals WHERE user_id = '$user_id' AND goal_type = 'annual'";
$result_annual = mysqli_query($conn, $sql_annual);
if ($row_annual = mysqli_fetch_assoc($result_annual)) {
    $annual_goal = $row_annual['goal_value'];
}

// Fetch monthly goal for the user
$sql_monthly = "SELECT goal_value FROM Goals WHERE user_id = '$user_id' AND goal_type = 'monthly'";
$result_monthly = mysqli_query($conn, $sql_monthly);
if ($row_monthly = mysqli_fetch_assoc($result_monthly)) {
    $monthly_goal = $row_monthly['goal_value'];
}

// Return JSON response with the goals
$response = array(
    'annual_goal' => $annual_goal,
    'monthly_goal' => $monthly_goal
);

header('Content-Type: application/json');
echo json_encode($response);
?>
