<?php
 include "bookcatalogue_/settings/connection.php";
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
            <h1>GRINGOTTS</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="" class="dashboard" data-page="bookcatalogue_/views/dashboard.php">Home</a></li>
                <li><a href="#" class="nav-link" data-page="/bookcatalogue_/views/library.php">Library</a></li>
                <li><a href="#" class="nav-link" data-page="/bookcatalogue_/views/goals.php">Goals</a></li>
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
                if (page ==='dashboard'){
                    window.location.href ='/bookcatalogue_/views/dashboard.php';
                }
                if (page === 'logout') {
                    window.location.href = '../login/logout_view.php'; // Redirect to logout page
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
