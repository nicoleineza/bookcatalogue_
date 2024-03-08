<?php
include 'settings/connection.php';

$searchTerm = trim($_POST["search_term"]);
// Prepare SQL query (consider using prepared statements for security)
$sql = "SELECT b.Title, b.Author, b.Cover, u.UserName
        FROM Books AS b
        INNER JOIN UserBooks AS ub ON b.BookID = ub.BookID
        INNER JOIN Users AS u ON ub.UserID = u.UserID
        WHERE b.Title LIKE '%$searchTerm%'
        GROUP BY b.BookID";


$result = $db->query($sql);

// Check query results
if ($result->num_rows > 0) {
    echo "<ul class='dropdown-menu' id='search-results'>"; // Start the dropdown menu
    while ($row = $result->fetch_assoc()) {
        echo "<li class='dropdown-item d-flex align-items-center'>
                <img src='{$row['Cover']}' class='img-fluid me-2' alt='{$row['Title']} Cover' width='40' height='30'>
                <div>
                    <a href='#'><strong>{$row['Title']}</strong></a>
                    <p class='mb-0'>by {$row['Author']} - {$row['UserName']}</p>
                </div>
              </li>";
    }
    echo "</ul>"; // End the dropdown menu
} else {
    echo "<p class='dropdown-item'>No results found.</p>";
}

$db->close();
?>
