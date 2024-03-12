<?php

include '../settings/connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="chore icon.png">
    <title>GRINGOTTS</title>
    <link rel="stylesheet" href="/bookcatalogue_/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


<body>
<div class="sidebar">
    <div class="logo">
        <!--<img src="" width="100" height="100">-->
    </div>


    <ul class="menu">
        <li>
            <a href="../views/dashboard.php" class="active">
                <i class='bx bx-home'></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="library.php">
                <i class='bx bx-book'></i>
                <span>Book Catalogue</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-book-reader'></i>
                <span>Goals</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-medal'></i>
                <span>Competitions</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-search'></i>
                <span>Search</span>
            </a>
        </li>
        <li>
            <a href="discover.php">
                <i class='bx bx-compass'></i>
                <span>Discover</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-user'></i>
                <span>Profile</span>
            </a>
        </li>


        <li class="logout">
            <a href="../login/logout_view.php">
                <i class='bx bx-log-out'></i>
                <span>Sign out</span>
            </a>
        </li>


    </ul>


</div>


<div class="main">
    <div class="header-wrapper">
        <div class="header-title">
            <span>Welcome to</span>
            <h2>User Dashboard</h2>
        </div>


        <div class="user-info">
            <div class="user-details">
                
                <?php
           session_start();

            

            if (isset($_SESSION['user_id'])) {
                $id = $_SESSION['user_id'];
                $query = "SELECT * FROM Users WHERE user_id = '$id'";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);

                echo '<h3>'. $row['firstname'].' '. $row['lastname']. '</h3>';

                
                
            } 
            ?>
                
            </div>
        </div>
    </div>


    <div class="statistics-container">
        <h3 class="main-title">Activity</h3>
        <div class="statistics-wrapper">
            <a href="managechores.html" style="text-decoration: none;">
                <div class="progress">
                    <div class="progress-header">
                        <div class="stats-value">
                            <span class="title"><strong><i class='bx bx-line-chart'></i> Progress</strong></span>
                        </div>
                        <span class="value"><strong>5/10</strong><br>Way to Go!</span>
                    </div>
                </div>
            </a>


            <a href="goals.php" style="text-decoration: none;">
                <div class="achievements">
                    <div class="achievements-header">
                        <div class="achievements-value">
                            <span class="title"><strong><i class='bx bx-medal'></i>Achievements</strong></span>
                        </div>
                        <span class="value"><strong>0</strong></span>
                    </div>
                </div>
            </a>


            <a href="competitions.php" style="text-decoration: none;">
                <div class="mywork">
                    <div class="mywork-header">
                        <div class="mywork-value">
                            <span class="title"><strong><i class='bx bx-task'></i>My Work</strong></span>
                        </div>
                        <span class="value"><strong>0</strong></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<footer>
    <div class="footer_container">
        <div class="footer_logo">
            <a href="#"></a>
        </div>
        <div class="footer_links">
            <ul>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fas fa-times"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
    <div id="footer_social">
       
    </div>
    <div class="footer_bottom">
        <p>&copy; 2024 GRINGOTTS. All rights reserved.</p>
    </div>
</footer>


</body>
</html>



