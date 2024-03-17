<?php
// Include database connection
include "../settings/connection.php";

// Fetch monthly goal value from the database if exists
$sql_monthly = "SELECT goal_value FROM Goals WHERE goal_type = 'monthly'";
$result_monthly = mysqli_query($connection, $sql_monthly);

// Initialize variables for monthly goal value
$monthly_goal_value = "No monthly goals set.";

// Check if monthly goal exists
if ($result_monthly && mysqli_num_rows($result_monthly) > 0) {
    $row_monthly = mysqli_fetch_assoc($result_monthly);
    $monthly_goal_value = $row_monthly['goal_value'];
}

// Fetch annual goal value from the database if exists
$sql_annual = "SELECT goal_value FROM Goals WHERE goal_type = 'annual'";
$result_annual = mysqli_query($connection, $sql_annual);

// Initialize variables for annual goal value
$annual_goal_value = "No annual goals set.";

// Check if annual goal exists
if ($result_annual && mysqli_num_rows($result_annual) > 0) {
    $row_annual = mysqli_fetch_assoc($result_annual);
    $annual_goal_value = $row_annual['goal_value'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/bookcatalogue_/assets/icons/logo.png">
    <title>GRINGOTTS</title>
    <link rel="stylesheet" href="/bookcatalogue_/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="/bookcatalogue_/assets/icons/logo.png" alt="GRINGOTTS Logo">
            <h1>GRINGOTTS</h1><br> <h3></h3>
        </div>
        
        <nav class="nav">
            <ul>
                <li><a href="/bookcatalogue_/views/dashboard.php" class="dashboard">Home</a></li>
                <li><a href="#" class="nav-link" data-page="/bookcatalogue_/views/library.php">Library</a></li>
                <li><a href="#" class="nav-link" data-page="/bookcatalogue_/views/setgoal.php">Goals</a></li>
                <li><a href="#" class="nav-link" data-page="/bookcatalogue_/views/competitions.php">Competitions</a></li>
                <li><a href="#" class="nav-link" data-page="/bookcatalogue_/views/search.php">Search</a></li>
                <li><a href="#" class="nav-link" data-page="/bookcatalogue_/views/discover.php">Discover</a></li>
                <li><a href="#" class="nav-link" data-page="/bookcatalogue_/views/profile.php">Profile</a></li>
                <li class="logout"><a href="../login/logout_view.php">Sign out</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <aside class="sidebar">
            <div class="user-info">
                <?php
                session_start();
                if (isset($_SESSION['user_id'])) {
                    $id = $_SESSION['user_id'];
                    $query = "SELECT * FROM Users WHERE user_id = '$id'";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo '<h3>' . $row['firstname'] . ' ' . $row['lastname'] . '</h3>';
                }
                ?>
            </div>
        </aside>
        <div class="content" id="page-content">
            <!-- Dynamic content will be loaded here -->
            <div class="goal-section">
                <h2 class="goal-title">Current Monthly Goal:</h2>
                <p class="goal-value"><?php echo $monthly_goal_value; ?></p>
                <h2 class="goal-title">Current Annual Goal:</h2>
                <p class="goal-value"><?php echo $annual_goal_value; ?></p>
            </div>

        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <h2>GRINGOTTS</h2>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-social">
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 GRINGOTTS. All rights reserved.</p>
        </div>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const navLinks = document.querySelectorAll('.nav-link');
        const pageContent = document.getElementById('page-content');

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = this.getAttribute('data-page');
                if (!page) return; 
                if (page === '/bookcatalogue_/views/dashboard.php') {
                    // Refresh the current page if Home button is clicked
                    window.location.reload();
                } else if (page === 'logout') {
                    window.location.href = '../login/logout_view.php';
                } else {
                    fetch(page)
                        .then(response => response.text())
                        .then(data => {
                            pageContent.innerHTML = data;
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    });
    </script>
</body>
</html>
