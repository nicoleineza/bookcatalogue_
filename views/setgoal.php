<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/bookcatalogue_/settings/connection.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch monthly goal value from the database if exists
$sql_monthly = "SELECT goal_value FROM Goals WHERE goal_type = 'monthly'";
$result_monthly = mysqli_query($connection, $sql_monthly);

if ($result_monthly && mysqli_num_rows($result_monthly) > 0) {
    $row_monthly = mysqli_fetch_assoc($result_monthly);
    $monthly_goal_value = $row_monthly['goal_value'];
} else {
    $monthly_goal_value = "No monthly goals set.";
}

// Fetch annual goal value from the database if exists
$sql_annual = "SELECT goal_value FROM Goals WHERE goal_type = 'annual'";
$result_annual = mysqli_query($connection, $sql_annual);

if ($result_annual && mysqli_num_rows($result_annual) > 0) {
    $row_annual = mysqli_fetch_assoc($result_annual);
    $annual_goal_value = $row_annual['goal_value'];
} else {
    $annual_goal_value = "No annual goals set.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goal Tracking</title>
    <link rel="stylesheet" type="text/css" href="/bookcatalogue_/css/setgoal.css">

</head>
<body>
    <h1>Goal Tracking</h1>
    
    <!-- Set Annual Goal Form -->
    <h2>Set Annual Goal</h2>
    <form id="annual_goal_form" action="/bookcatalogue_/functions/record_goals.php" method="post">
        <label for="annual_goal">Number of Books to Read Annually:</label>
        <input type="number" id="annual_goal" name="annual_goal" min="0" required>
        <button type="submit" name="set_annual_goal" onclick="reloadPage()">Set Annual Goal</button>
    </form>

    <!-- Set Monthly Goal Form -->
    <h2>Set Monthly Goal</h2>
    <form id="monthly_goal_form" action="/bookcatalogue_/functions/record_goals.php" method="post">
        <label for="monthly_goal">Number of Books to Read Monthly:</label>
        <input type="number" id="monthly_goal" name="monthly_goal" min="0" required>
        <button type="submit" name="set_monthly_goal" onclick="reloadPage()">Set Monthly Goal</button>
    </form>

    <!-- Containers for displaying goals -->
<div class="goal-container">
    <div>
        <h2>Monthly Goals</h2>
        <div id="monthly_goals_container"><?php echo $monthly_goal_value; ?></div>
    </div>

    <div>
        <h2>Annual Goals</h2>
        <div id="annual_goals_container"><?php echo $annual_goal_value; ?></div>
    </div>
</div>

    <script>
        // Function to fetch and update goals from the server
        function updateGoals() {
            fetch('/bookcatalogue_/functions/fetch_goals.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('monthly_goals_container').innerText = data.monthly_goals;
                document.getElementById('annual_goals_container').innerText = data.annual_goals;
            })
            .catch(error => console.error('Error fetching goals:', error));
        }

        // Function to reload the page after setting a goal
        function reloadPage() {
            updateGoals();
            location.reload(); 
        }

        
        updateGoals();
    </script>
</body>
</html>
