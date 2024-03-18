<?php
include '../settings/connection.php';

// Assuming $connection is the database connection variable from your 'connection.php' file
$connection = $GLOBALS['connection'];

// Get the userID and search term from the POST variables
$userID = $_POST['userID'];
$search = $_POST['search'];

function search_books($userID, $search)
{
    $connection = $GLOBALS['connection'];

    $sql = "SELECT Books.* FROM Books 
            JOIN UserBooks ON Books.BookID = UserBooks.BookID 
            WHERE UserBooks.UserID = ? 
            AND (Books.Author LIKE CONCAT('%', ?, '%') 
            OR Books.Title LIKE CONCAT('%', ?, '%'))";

    
    $stmt = $connection->prepare($sql);

    
    $stmt->bind_param("iss", $userID, $search, $search);

    // Execute the query
    $stmt->execute();

    $result = $stmt->get_result();

    // Check if there are any books
    if ($result->num_rows > 0) {
        // Output each book
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-3">
                    <a id="book-link" href="book_page.php?bookID=' . $row['BookID'] . '">
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

search_books($userID, $search);
?>
