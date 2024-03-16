<?php

include '../settings/connection.php';


// Get the userID and categoryID from the POST variables, if they're set
$userID = isset($_POST['userID']) ? $_POST['userID'] : 1; // default to 1
$categoryID = isset($_POST['categoryID']) ? $_POST['categoryID'] : 'all'; // default to 'all'


function display_books($userID, $categoryID = 'all')
{
    $db = $GLOBALS['db'];


    $sql = "SELECT Books.* FROM Books 
            JOIN UserBooks ON Books.BookID = UserBooks.BookID";

    // If a specific category is selected, join with the bookcategories table
    if ($categoryID !== 'all') {
        $sql .= " JOIN BookCategories ON Books.BookID = BookCategories.BookID 
                   AND BookCategories.CategoryID = ?";
    }

    $sql .= " WHERE UserBooks.UserID = ?";

    $stmt = $db->prepare($sql);

    if ($categoryID !== 'all') {
        $stmt->bind_param("ii", $categoryID, $userID);
    } else {
        $stmt->bind_param("i", $userID);
    }

    // Execute the query
    $stmt->execute();

    $result = $stmt->get_result();

    // Check if there are any books
    if ($result->num_rows > 0) {
        // Output each book
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-3">
                    <a id="book-link" href="../views/book_page.php?bookID=' . $row['BookID'] . '">
                        <div class="card">
                            <img src="' . htmlspecialchars($row['Cover']) . '" class="card-img-top" alt="Book Image" />
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($row['Title']) . '</h5>
                                <p class="card-text">' . htmlspecialchars($row['Author']) . '</p>
                            </div>
                        </div>
                    </a>    
                </div>';
        }
    } else {
        echo "No books found.";
    }

    $stmt->close();
}


display_books($userID, $categoryID);
