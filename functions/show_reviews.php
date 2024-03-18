<?php
function showReviews($bookID)
{
    global $connection; // Use the $conn from the included connection file

    // Prepare the SQL statement
    $sql = "SELECT users.firstname, users.lastname,  reviews.ReviewText, reviews.Rating, reviews.ReviewDate 
            FROM reviews 
            JOIN users ON reviews.UserID = users.user_id 
            WHERE reviews.BookID = ?";
    
    /* $sql = "SELECT users.firstname, users.lastname, userphoto.photo, reviews.ReviewText, reviews.Rating, reviews.ReviewDate 
    FROM reviews 
    JOIN users ON reviews.UserID = users.user_id 
    JOIN userphoto ON users.user_id = userphoto.user_id 
    WHERE reviews.BookID = ?"; */

    // Create a prepared statement
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bind_param("i", $bookID);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch data and display
    while ($row = $result->fetch_assoc()) {
        echo '<div class="media mt-3">';
        echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReHlx51nzRyT2IGzXt9Ow0uUOOTCEAXlPejZhQLm1aAw&s" class="mr-3 rounded-circle" alt="Profile Photo" style="width: 40px; height: 40px;">';
        echo '<div class="media-body">';
        echo '<h5 class="mt-0">'.$row['firstname'].' '.$row['lastname'].'</h5>';
        echo '<div class="rating">';
        for($i = 0; $i < $row['Rating']; $i++){
            echo '<span class="fa fa-star checked"></span>';
        }
        for($i = $row['Rating']; $i < 5; $i++){
            echo '<span class="fa fa-star"></span>';
        }
        echo '</div>';
        echo '<p>'.htmlspecialchars($row['ReviewText']).'</p>';
        echo '<small class="text-muted">Posted on '.$row['ReviewDate'].'</small>';
        echo '</div></div>';
    }
}
