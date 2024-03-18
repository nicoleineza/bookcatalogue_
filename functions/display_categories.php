<?php
include '../settings/connection.php';
include_once '../settings/core.php';

function display_categories($userID)
{

    $connection = $GLOBALS['connection'];

    // Prepare the query
    $query = "SELECT Categories.Category, Categories.CategoryID FROM Categories 
          JOIN UserCategories ON Categories.CategoryID = UserCategories.CategoryID 
          WHERE UserCategories.UserID = ?;";

    if ($stmt = $connection->prepare($query)) {
        // Bind the parameter
        $stmt->bind_param("i", $userID);

        // Execute the query
        if ($stmt->execute()) {
            // Get the result
            $result = $stmt->get_result();
            $categories = $result->fetch_all(MYSQLI_ASSOC);


            $stmt->close();
        } else {
            die("Query execution failed: " . $stmt->error);
        }
    } else {
        die("failed: " . $connection->error);
    }



    // Add an "All" category
    echo '<a href="#" class="list-group-item list-group-item-action category" data-category-id="all">All</a>';

    foreach ($categories as $category) {
        echo '<a href="#" class="list-group-item list-group-item-action category" data-category-id="' . $category['CategoryID'] . '">' . $category['Category'] . '</a>';
    }
}
