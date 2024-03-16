<?php
include '../settings/connection.php';

function display_categories($userID)
{
    global $connection;

    // Prepare the SQL statement for user-specific categories
    $sql_user_categories = "SELECT categories.Category, categories.CategoryID 
                            FROM categories 
                            JOIN usercategories ON categories.CategoryID = usercategories.CategoryID 
                            WHERE usercategories.UserID = ?";

    // Prepare the statement for user-specific categories
    $stmt_user_categories = $connection->prepare($sql_user_categories);

    // Bind the parameter for user-specific categories
    $stmt_user_categories->bind_param("i", $userID);

    // Execute the query for user-specific categories
    $stmt_user_categories->execute();

    // Get the result for user-specific categories
    $result_user_categories = $stmt_user_categories->get_result();

    // Check if there are any user-specific categories
    if ($result_user_categories->num_rows > 0) {
        // Fetch the user-specific categories as an associative array
        $categories_user = $result_user_categories->fetch_all(MYSQLI_ASSOC);

        // Add an "All" category
        echo '<a href="#" class="list-group-item list-group-item-action category" data-category-id="all">All</a>';

        // Output each user-specific category
        foreach ($categories_user as $category) {
            echo '<a href="#" class="list-group-item list-group-item-action category" data-category-id="' . $category['CategoryID'] . '">' . $category['Category'] . '</a>';
        }
    } else {
        // If no user-specific categories found, display a message
        echo '<p>No categories found for the user.</p>';
    }

    // Close the statement for user-specific categories
    $stmt_user_categories->close();

    // Fetch all categories from the database
    $result_all_categories = $connection->query("SELECT Category, CategoryID FROM categories");

    if (!$result_all_categories) {
        die("Query failed: " . $connection->error);
    }

    $categories_all = $result_all_categories->fetch_all(MYSQLI_ASSOC);

    // Display existing categories
    foreach ($categories_all as $category) {
        echo '<a href="#" class="list-group-item list-group-item-action category" data-category-id="' . $category['CategoryID'] . '">' . $category['Category'] . '</a>';
    }

    // Display button to add new category
    echo '<button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>';
}

?>
