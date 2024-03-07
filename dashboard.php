<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRINGOTTS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-book"></span> Book Catalogue</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="dashboard.php" class="active"><span class="las la-home"></span> Dashboard</a></li>
                <li><a href="library.php"><span class="las la-book"></span> Book Catalogue</a></li>
                <li><a href="#"><span class="las la-book-reader"></span> Reading Goals</a></li>
                <li><a href="#"><span class="las la-medal"></span> Competitions</a></li>
                <li><a href="search.php"><span class="las la-search"></span> search</a></li>
                <li><a href="discover.php"><span class="las la-compass"></span> Discover</a></li>
                <li><a href="#"><span class="las la-user"></span> Profile</a></li>
                <li><a href="login.php"><span class="las la-sign-out-alt"></span> Sign out</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="user-wrapper">
                <img src="/assets/icons/user_icon.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Someone Someone</h4>
                    <small>user</small>
                </div>
            </div>
        </header> 
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>5/10</h1>
                        <span>progress</span>
                        <h5>Way to Go!</h5>
                    </div>
                    <div>
                        <span class="las la-chart-line"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>7</h1>
                        <span>Achievements</span>
                    </div>
                    <div>
                        <span class="las la-trophy"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>7</h1>
                        <span>My Work</span>
                    </div>
                    <div>
                        <span class="las la-pencil-alt"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Profile Views</span>
                    </div>
                    <div>
                        <span class="las la-user"></span>
                    </div>
                </div>
                
                
            </div>
            <div class="recent-flex">
                
            </div>
        </main>
    </div>
    
</body>
</html>
