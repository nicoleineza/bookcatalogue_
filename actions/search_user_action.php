<?php
//including the connection file
include ('../settings/connection.php');





    // Your SELECT query to fetch all chores
    $query = "SELECT
    u.firstname,
    u.lastname,
    u.email,
    GROUP_CONCAT(DISTINCT b.Genre ORDER BY b.Genre SEPARATOR ', ') AS Genres_Read
FROM
    Users u
INNER JOIN
    userbooks ub ON u.user_id = ub.UserID
INNER JOIN
    books b ON ub.BookID = b.BookID
GROUP BY
    u.user_id";

    

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





