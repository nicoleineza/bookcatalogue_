<?php
include '../settings/connection.php';


 // Get the category name from the AJAX request
 $categoryName = $_POST['categoryName'];
 $userID = $_POST['userID'];

 // Check if the category already exists
 $sql = "SELECT CategoryID FROM Categories WHERE Category = '$categoryName'";
 $result = $db->query($sql);

 if ($result->num_rows > 0) {
     // If the category exists, get the CategoryID
     $row = $result->fetch_assoc();
     $categoryID = $row["CategoryID"];
 } else {
     // If the category does not exist, insert it into the Categories table
     $sql = "INSERT INTO Categories (Category) VALUES ('$categoryName')";

     if ($db->query($sql) === TRUE) {
         $categoryID = $db->insert_id;
         echo "New record created successfully in Categories. Last inserted ID is: " . $categoryID;
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
 }

 // Insert the new category into the UserCategories table
 $sql = "INSERT INTO UserCategories (UserID, CategoryID) VALUES ('$userID', '$categoryID')";

 if ($db->query($sql) === TRUE) {
     echo "New record created successfully in UserCategories";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $db->close();