<?php
include ('../settings/core.php');

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
    <h2>Your first step to being an author, maybe?</h2>
    <form method="post" action="../bookcatalogue_/action/publish_action.php">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content"></textarea><br>
        
        <label for="author">Your Name:</label><br>
        <input type="text" id="author" name="author"><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>