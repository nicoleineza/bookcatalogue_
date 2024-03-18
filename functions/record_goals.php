<?php
/* // Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: ../bookcatalogue_/views/login.php");
    exit();
}
 */

 
// Include database connection
include ('../settings/connection.php'); // Adjust the path as needed

// Function to handle goal insertion and redirection
function insertOrUpdateGoal($connection, $user_id, $goal_type, $goal_value, $redirect_page) {
    // Check if goal value already exists for the user and goal type
    $sql_check = "SELECT * FROM Goals WHERE user_id = '$user_id' AND goal_type = '$goal_type'";
    $result_check = mysqli_query($connection, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {
        // Update the existing goal value
        $sql_update = "UPDATE Goals SET goal_value = '$goal_value' WHERE user_id = '$user_id' AND goal_type = '$goal_type'";
        if (mysqli_query($connection, $sql_update)) {
            // Goal value updated successfully
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            // Error updating goal value
            echo "Error: " . $sql_update . "<br>" . mysqli_error($connection);
        }
    } else {
        // Insert new goal value
        $sql_insert = "INSERT INTO Goals (user_id, goal_type, goal_value) VALUES ('$user_id', '$goal_type', '$goal_value')";
        if (mysqli_query($connection, $sql_insert)) {
            // Goal inserted successfully
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            // Error inserting goal
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($connection);
        }
    }
}

// Check if the form for setting annual goal is submitted
if(isset($_POST['set_annual_goal'])) {
    // Sanitize and validate annual goal input
    $annual_goal = filter_input(INPUT_POST, 'annual_goal', FILTER_VALIDATE_INT);
    
    // Check if annual goal is valid
    if ($annual_goal === false || $annual_goal < 0) {
        // Redirect back to the page with an error message
        header("Location: ../views/dashboard.php?error=invalid_annual_goal");
        exit();
    }

    // Insert or update annual goal into database
    insertOrUpdateGoal($connection, $_SESSION['user_id'], 'annual', $annual_goal, '../views/setgoal.php');
}

// Check if the form for setting monthly goal is submitted
if(isset($_POST['set_monthly_goal'])) {
    // Sanitize and validate monthly goal input
    $monthly_goal = filter_input(INPUT_POST, 'monthly_goal', FILTER_VALIDATE_INT);
    
    // Check if monthly goal is valid
    if ($monthly_goal === false || $monthly_goal < 0) {
        // Redirect back to the page with an error message
        header("Location: ../bookcatalogue_/views/dashboard.php?error=invalid_monthly_goal");
        exit();
    }

    // Insert or update monthly goal into database
    insertOrUpdateGoal($connection, $_SESSION['user_id'], 'monthly', $monthly_goal, '../views/setgoal.php');
}

?>
