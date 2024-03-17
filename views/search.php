

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
        <title>Search Page</title>

        <!--style.css-->
        <link rel="stylesheet" href="../css/search.css">
    </head>




<body>



<!--welcome-hero start -->
<section id="home" class="welcome-hero">
    <div class="container">
        <div class="welcome-hero-txt">
            <h2>Best place to find and explore <br> other book lovers</h2>
            <p>
                Discover, Connect, Read: Where Bookworms Unite! with just One click 
            </p>
        </div>
        
                    
                   
                    
                <button class="welcome-hero-btn" name="genrebtn" id="genrebtn">
                     Connect  <i data-feather="search"></i> 
                </button>
            
                    
               

    </div>


</section>


<!-- Table to display users -->
<div id="usersTableContainer">
        <table id="usersTable">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Genres Read</th>
                </tr>
            </thead>
            <tbody id="usersTableBody">
                <?php 
                include ('../actions/search_user_action.php');
                foreach ($userData as $user): ?>
                    <tr>
                        <td><?php echo $user['firstname']; ?></td>
                        <td><?php echo $user['lastname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['Genres_Read']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#genrebtn').click(function() {
                $.ajax({
                    type: 'GET',
                    url: '../actions/search_user_action.php',
                    
                });
            });

            
        });
    </script>


</body>
</html>
