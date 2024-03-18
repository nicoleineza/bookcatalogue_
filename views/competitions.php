<?php
session_start();

include ('../settings/core.php');

?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Competitions Page</title>

        <!--style.css-->
        <link rel="stylesheet" href="../css/competition.css">

        <style>
    .usersTableContainer {
        width: 1000px;
        margin: 30px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .usersTable {
        width: 100%; /* Adjusted to 100% */
        table-layout: fixed;
    }

    .usersTable tr th,
    table.table tr td {
        border-color: #e9e9e9;
    }

    .usersTable th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    .usersTable th:last-child {
        width: 100px;
    }

   
        /* Header Styles */
.top-section {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #5c48ee;
    color: #fff;
   
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
}

.logo {
    display: flex;
    align-items: center; 
}

.logo img {
    width: 40px; 
    height: auto; 
    margin-right: 10px; 
}

.logo h1 {
    font-size: 24px;
}

.nav ul {
    list-style: none;
    display: flex;
}

.nav ul li {
    margin-right: 20px;
}

.nav ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    transition: color 0.3s;
}

.nav ul li a:hover {
    color: #ffd700;
}

</style>

    </head>




<body>
<section class="top-section">
        <div class="logo">
            <img src="/bookcatalogue_/assets/icons/logo.png" alt="GRINGOTTS Logo">
            <h1>GRINGOTTS</h1><br> <h3></h3>
        </div>
        
        <nav class="nav">
            <ul>
            <a href="/bookcatalogue_/views/dashboardcopy.php" class="dashboard"><li>Home</li></a>
            <a href="/bookcatalogue_/views/library.php" class="nav-link" ><li>Library</li></a>
                <a href="/bookcatalogue_/views/setgoal.php" class="nav-link" ><li>Goals</li></a>
                <a href="/bookcatalogue_/views/competitions.php" class="nav-link"><li>Competitions</li></a>
                <a href="/bookcatalogue_/views/search.php" class="nav-link"><li>Search</li></a>
                <a href="/bookcatalogue_/views/discover.php" class="nav-link"><li>Discover</li></a>
                <a href="/bookcatalogue_/views/profile.php" class="nav-link"><li>Profile</li></a>
                <a href="/bookcatalogue_/login/logout_view.php"><li class="logout">Sign out</li></a>
            </ul>
        </nav>
</section>



<!--welcome-hero start -->
<section id="home" class="welcome-hero">
<video autoplay loop muted class="welcome-hero-video">
            <source src="../assets/video/Readingvideo.mp4" type="video/mp4" width="300">
            <!-- Add other video formats if needed -->
        </video>
    <div class="container">
        <div class="welcome-hero-txt">
            <h2>Champions aren't born <br> They are made</h2>
            
        </div>  
                    
                <button class="welcome-hero-btn" name="genrebtn" id="genrebtn">
                     Top 3 Readers  <i data-feather="search"></i> 
                </button>
            
                    
               

    </div>


</section>


<!-- Table to display users -->
<?php
    include '../actions/competition_action.php';
    if ($userData !== null) {
        echo '<div class="usersTableContainer">
            <table class="usersTable">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>num_books_read</th>
                        <th>books_read</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">';
        foreach ($userData as $user) {
            echo '<tr>
                        <td>' . $user['firstname'] . '</td>
                        <td>' . $user['lastname'] . '</td>
                        <td>' . $user['num_books_read'] . '</td>
                        <td>' . $user['books_read'] . '</td>
                    </tr>';
        }
        echo '</tbody>
            </table>
        </div>';
    }
        ?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#genrebtn').click(function() {
                $.ajax({
                    type: 'GET',
                    url: ('../actions/competition_action.php'),
                    
                });
            });

            
        });
    </script>


</body>
</html>
