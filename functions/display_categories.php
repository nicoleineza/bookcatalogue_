<?php
include 'settings/connection.php';

function display_categories($userID)
{
    $db = $GLOBALS['db'];
    $result = $db->query("SELECT Categories.Category, Categories.CategoryID FROM Categories 
    JOIN UserCategories ON Categories.CategoryID = UserCategories.CategoryID 
    WHERE UserCategories.UserID = " . $userID . ";");

    if (!$result) {
        die("Query failed: " . $db->error);
    }

    $categories = $result->fetch_all(MYSQLI_ASSOC);

    // Add an "All" category
    echo '<a href="#" class="list-group-item list-group-item-action category" data-category-id="all">All</a>';

    foreach ($categories as $category) {
        echo '<a href="#" class="list-group-item list-group-item-action category" data-category-id="' . $category['CategoryID'] . '">' . $category['Category'] . '</a>';
    }
}
