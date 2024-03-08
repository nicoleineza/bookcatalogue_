<?php

include '../settings/connection.php';

// Get the userID and categoryID from the POST variables, if they're set
$userID = isset($_POST['userID']) ? $_POST['userID'] : 1; // default to 1
$categoryID = isset($_POST['categoryID']) ? $_POST['categoryID'] : 'all'; // default to 'all'

function display_books($userID, $categoryID = 'all')
{
    $db = $GLOBALS['db'];

    $sql = "SELECT Books.* FROM Books 
    JOIN UserBooks ON Books.BookID = UserBooks.BookID 
    WHERE UserBooks.UserID = " . $userID;

    if ($categoryID !== 'all') {
        $sql .= " AND UserBooks.CategoryID = " . $categoryID;
    }

    $sql .= ";";

    $result = $db->query($sql);

    // Check if there are any books
    if ($result->num_rows > 0) {
        // Output each book
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-3">
                    <div class="card">
                        <img src="' . $row['Cover'] . '" class="card-img-top" alt="Book Image" />
                        <div class="card-body">
                            <h5 class="card-title">' . $row['Title'] . '</h5>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "No books found.";
    }
}

display_books($userID, $categoryID);