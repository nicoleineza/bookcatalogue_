<?php
//including the connection file
include ('../settings/connection.php');





    // Your SELECT query to fetch all chores
    $query = "SELECT
    U.firstname,
    U.lastname,
    COUNT(UB.BookID) AS num_books_read,
    GROUP_CONCAT(B.Title SEPARATOR ', ') AS books_read
FROM
    Users U
INNER JOIN
    userbooks UB ON U.user_id = UB.UserID
INNER JOIN
    books B ON UB.BookID = B.BookID
GROUP BY
    U.user_id
ORDER BY
    num_books_read DESC
LIMIT 3";

    

    // Execute the query
    $result = mysqli_query($connection, $query);

    

    // Check if the query execution was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Check if any records were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch records and assign to a variable
        
        $userData = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $userData[] = $row;
        }

        //echo json_encode($userData);

        // Close the result set
        //mysqli_free_result($result);

       


}
else {
    // No records found
    return null;
}


// Close database connection
mysqli_close($connection);


?>





