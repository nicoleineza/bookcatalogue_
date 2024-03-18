<?php

include ('../settings/core.php');

?>








<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gringotts : Home</title>
    
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="../css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="../css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Lato for Title -->
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
 
 
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
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
                <li><a href="/bookcatalogue_/views/dashboardcopy.php" class="dashboard">Home</a></li>
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




	<!-- Start Featured Slider -->

	<section id="mu-hero">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-6 col-sm-push-6">
					<div class="mu-hero-right">
						<!--<img src="../assets/images/books.png" alt="Ebook img">-->
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-sm-pull-6">
					<div class="mu-hero-left">
						<h1>Dive into worlds unknown and stories untold , your next adventure awaits.</h1>
						
						
					</div>
				</div>	

			</div>
		</div>
	</section>
	
	<!-- Start Featured Slider -->
	
	<!-- Start main content -->
		
	<main role="main">

		<!-- Start Counter -->
		<section id="mu-counter">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-counter-area">

							<div class="mu-counter-block">
								<div class="row">

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-files-o" aria-hidden="true"></i>
                                            <?php
                                            include '../actions/books_read_action.php';?>
											<div class="counter-value" data-count="<?php echo $total_books_read; ?>"><?php echo $total_books_read; ?></div>
											<h5 class="mu-counter-name">Books read</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
                                            <?php
                                            include '../actions/genres_action.php';?>
											<div class="counter-value" data-count="<?php echo $genres; ?>"><?php echo $genres; ?></div>
											<h5 class="mu-counter-name">Genres Explored</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-users" aria-hidden="true"></i>
                                            <?php
                                            include '../actions/currently_reading.php';?>
											<div class="counter-value" data-count="<?php echo $currently_reading; ?>"><?php echo $currently_reading; ?></div>
											<h5 class="mu-counter-name">Currently reading</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-trophy" aria-hidden="true"></i>
											<div class="counter-value" data-count="03">0</div>
											<h5 class="mu-counter-name">Got Awards</h5>
										</div>
									</div>
									<!-- / Single Counter -->

								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Counter -->


        <!-- Start Book Overview -->
        <section id="mu-book-overview">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-book-overview-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Book Overview</h2>
								<span class="mu-header-dot"></span>
								<h3>The following are the books you have read so far</h3>
                                <h3>Continue igniting your imagination, and exploring new worlds within the pages of a book!!!</h3>
							</div>

		 <!-- Start Book Overview Content -->
         <div class="mu-book-overview-content">
                        <div class="row">
                            <?php
                            include '../actions/display_dashboard_books.php';
                            // Loop through the results and display book covers
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="col-md-3 col-sm-6">';
                                    echo '<div class="mu-book-overview-single">';
                                    echo '<img src="' . $row["Cover"] . '" alt="Book Cover">';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo "No books found.";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- End Book Overview Content -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Book Overview -->

	

    
	
    
  </body>
</html>