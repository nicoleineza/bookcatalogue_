<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Books</title>
    <link rel="stylesheet" type="text/css" href="/bookcatalogue_/css/discover.css">

     <!--Header styles-->
        
     <style>
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


<div class="container">
    <h1><em>DISCOVER YOUR NEXT GREAT READ</em></h1>

    

    <div class="genre">
        <h2>ROMANCE</h2>
        <div class="book-list">
            <div class="book"><img src="/bookcatalogue_/assets/images/romance1.jpeg" alt="Romance Book 1"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/lred.jpeg" alt="Romance Book 2"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/romance3.jpeg" alt="Romance Book 3"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/romance4.jpeg" alt="Romance Book 4"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/romance5.jpeg" alt="Romance Book 5"></div>
           
        </div>
    </div>

    <div class="genre">
        <h2>FANTASY</h2>
        <div class="book-list">
            <div class="book"><img src="/bookcatalogue_/assets/images/fantasy1.jpeg" alt="Fantasy Book 1"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/fantasy2.jpeg" alt="Fantasy Book 2"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/fantasy3.jpeg" alt="Fantasy Book 3"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/fantasy4.jpeg" alt="Fantasy Book 4"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/fantasy5.jpeg" alt="Fantasy Book 5"></div>
            
        </div>
    </div>

    <div class="genre">
        <h2>THRILLER</h2>
        <div class="book-list">
            <div class="book"><img src="/bookcatalogue_/assets/images/thriller1.jpeg" alt="Thriller Book 1"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/thriller2.jpeg" alt="Thriller Book 2"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/thriller6.jpeg" alt="Thriller Book 3"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/thriller4.jpeg" alt="Thriller Book 4"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/thriller5.jpeg" alt="Thriller Book 5"></div>
            
        </div>
    </div>

    <div class="genre">
        <h2>AFRICAN LITERATURE</h2>
        <div class="book-list">
            <div class="book"><img src="/bookcatalogue_/assets/images/alit1.jpg" alt="AFRICAN LITERATURE Book 1"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/alit2.jpg" alt="AFRICAN LITERATURE Book 2"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/alit3.jpg" alt="AFRICAN LITERATURE Book 3"></div>
            
        </div>
    </div>

    <div class="genre">
        <h2>SCIENCE FICTION</h2>
        <div class="book-list">
            <div class="book"><img src="/bookcatalogue_/assets/images/scifi1.jpg" alt="Sci-Fi Book 1"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/scifi2.jpg" alt="Sci-Fi Book 2"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/scifi3.jpg" alt="Sci-Fi Book 3"></div>
            
        </div>
    </div>

    <div class="genre">
        <h2>NON-FICTION</h2>
        <div class="book-list">
            <div class="book"><img src="/bookcatalogue_/assets/images/nonfi1.jpg" alt="Non-Fiction Book 1"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/nonfi2.jpg" alt="Non-Fiction Book 2"></div>
            <div class="book"><img src="/bookcatalogue_/assets/images/nonfi3.jpg" alt="Non-Fiction Book 3"></div>
            
        </div>
    </div>

    

</div>

</body>
</html>
