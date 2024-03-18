<?php
include('../settings/core.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Your Story</title>
    <link rel="stylesheet" type="text/css" href="../css/publish.css">
</head>

<body>

    <body>
        <nav class="nav">
            <ul>
                <li><a href="/bookcatalogue_/views/dashboard.php" class="dashboard">Home</a></li>
                <a href="/bookcatalogue_/views/library.php" class="nav-link">
                    <li>Library</li>
                </a>
                <a href="/bookcatalogue_/views/setgoal.php" class="nav-link">
                    <li>Goals</li>
                </a>
                <a href="/bookcatalogue_/views/competitions.php" class="nav-link">
                    <li>Competitions</li>
                </a>
                <a href="/bookcatalogue_/views/publish.php" class="nav-link">
                    <li>Publish</li>
                </a>
                <a href="/bookcatalogue_/views/search.php" class="nav-link">
                    <li>Search</li>
                </a>
                <a href="/bookcatalogue_/views/discover.php" class="nav-link">
                    <li>Discover</li>
                </a>
                <a href="/bookcatalogue_/views/profile.php" class="nav-link">
                    <li>Profile</li>
                </a>
                <a href="/bookcatalogue_/login/logout_view.php">
                    <li class="logout">Sign out</li>
                </a>
            </ul>
        </nav>
        <h2>Your first step to being an author, maybe?</h2>
        <form method="post" action="../actions/publish_action.php">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>

            <label for="content">Content:</label><br>
            <textarea id="content" name="content"></textarea><br>

            <input type="submit" name="submit" value="Submit">
        </form>


    </body>

</html>