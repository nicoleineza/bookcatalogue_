

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
        <title>Competition Page</title>

        <!--style.css-->
        <link rel="stylesheet" href="/bookcatalogue_/css/competition.css">

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
</style>

    </head>




<body>



<!--welcome-hero start -->
<section id="home" class="welcome-hero">
<video autoplay loop muted class="welcome-hero-video">
            <source src="/bookcatalogue_/assets/video/Readingvideo.mp4" type="video/mp4" width="300">
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
    include '/bookcatalogue_/actions/competition_action.php';
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
                    url: '/bookcatalogue_/actions/competition_action.php',
                    
                });
            });

            
        });
    </script>


</body>
</html>
