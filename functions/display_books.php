<?php

include '../settings/connection.php';
include_once '../settings/core.php';


// Get the userID and categoryID from the POST variables, if they're set
$userID = isset($_POST['userID']) ? $_POST['userID'] : $_SESSION['user_id']; // default to 1 (testing purposes only, should default to $userID) 
$categoryID = isset($_POST['categoryID']) ? $_POST['categoryID'] : 'all'; // default to 'all'


function display_books($userID, $categoryID = 'all')
{
    $connection = $GLOBALS['connection'];



    // Prepare the base SQL query
    $sql = "SELECT b.BookID, b.Author, b.Title, b.Genre, b.Cover, b.ISBN, b.PublicationDate, b.Description
FROM books b
JOIN bookcategories bc ON b.BookID = bc.BookID";

    // If a specific category is selected, add the condition to the WHERE clause
    if ($categoryID !== 'all') {
        $sql .= " WHERE bc.UserID = ? AND bc.CategoryID = ?";
    } else {
        $sql .= " WHERE bc.UserID = ?";
    }

    // Prepare and execute the SQL statement with the appropriate parameters
    $stmt = $connection->prepare($sql);

    // Bind parameters based on whether a specific category is selected or not
    if ($categoryID !== 'all') {
        $stmt->bind_param("ii", $userID, $categoryID);
    } else {
        $stmt->bind_param("i", $userID);
    }

    $stmt->execute();
    $result = $stmt->get_result();


    //print_r($result);

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
