<?php
include '../settings/connection.php';

// Assuming $db is the database connection variable from your 'connection.php' file
$db = $GLOBALS['db'];

// Get the userID and search term from the POST variables
$userID = $_POST['userID'];
$search = $_POST['search'];

function search_books($userID, $search)
{
    global $db;

    // Prepare the SQL statement with placeholders
    $sql = "SELECT Books.* FROM Books 
            JOIN UserBooks ON Books.BookID = UserBooks.BookID 
            WHERE UserBooks.UserID = ? 
            AND (Books.Author LIKE CONCAT('%', ?, '%') 
            OR Books.Title LIKE CONCAT('%', ?, '%'))";

    // Prepare the statement
    $stmt = $db->prepare($sql);

    // Bind the parameters to the placeholders
    $stmt->bind_param("iss", $userID, $search, $search);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are any books
    if ($result->num_rows > 0) {
        // Output each book
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-3">
                    <a id="book-link" href="book_page.php?bookID=' . $row['BookID'] . '">
                        <div class="card">
                            <img src="' . $row['Cover'] . '" class="card-img-top" alt="Book Image" />
                            <div class="card-body">
                                <h5 class="card-title">' . $row['Title'] . '</h5>
                                <p class="card-text">' . $row['Author'] . '</p>
                            </div>
                        </div>
                    </a>    
                </div>';
        }
    } else {
        echo "No books found.";
    }

    // Close the statement
    $stmt->close();
}

// Call the function with the provided userID and search term
search_books($userID, $search);
?>
