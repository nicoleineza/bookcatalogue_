<?php
// Fetch the CategoryIDs for the book and user
$query = "SELECT CategoryID FROM bookcategories WHERE UserID = ? AND BookID = ?
            AND CategoryID NOT IN (1, 2, 3);";
$stmt = $connection->prepare($query);
$stmt->bind_param("ii", $userID, $bookID);
$stmt->execute();
$result = $stmt->get_result();
$otherCategoryIDs = $result->fetch_all(MYSQLI_NUM);
$stmt->close();

// Convert the result to a simple array
$otherCategoryIDs = array_map(function($row) {
    return $row[0];
}, $otherCategoryIDs);

function display_categories_dropdown($userID, $bookID)
{
    $connection = $GLOBALS['connection'];
    $otherCategoryIDs = $GLOBALS['otherCategoryIDs'];

    // Prepare the query
    $query = "SELECT Categories.Category, Categories.CategoryID FROM Categories 
          JOIN UserCategories ON Categories.CategoryID = UserCategories.CategoryID 
          WHERE UserCategories.UserID = ? 
          AND Categories.CategoryID NOT IN (1, 2, 3);";

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
    foreach ($categories as $category) {
        echo '<li><input class="form-check-input" type="checkbox" value="' . $category['CategoryID'] . '" id=' . $category["CategoryID"] . ' '. isTicked($otherCategoryIDs, $category["CategoryID"]) .' onclick="updateCategory(' . $category['CategoryID'] . ', this.checked)"> <label class="form-check-label" for="' . $category['Category'] . '">' . $category['Category'] . '</label></li>';
    }
}

function isTicked($otherCategoryIDs, $categoryID)
{
    return in_array($categoryID, $otherCategoryIDs) ? "checked" : "";
}
?>
