<?php
include '../settings/connection.php';
include '../settings/core.php';


 // Get the category name from the AJAX request
 $categoryName = $_POST['categoryName'];
 $userID = $_POST['userID'];

 // Check if the category already exists
 $sql = "SELECT CategoryID FROM Categories WHERE Category = '$categoryName'";
 $result = $connection->query($sql);

 if ($result->num_rows > 0) {
     // If the category exists, get the CategoryID
     $row = $result->fetch_assoc();
     $categoryID = $row["CategoryID"];
 } else {
     // If the category does not exist, insert it into the Categories table
     $sql = "INSERT INTO Categories (Category) VALUES ('$categoryName')";

     if ($connection->query($sql) === TRUE) {
         $categoryID = $connection->insert_id;
         echo "New category added";
     } else {
         echo "Error: " . $sql . "<br>" . $connection->error;
     }
 }

 // Insert the new category into the UserCategories table
 $sql = "INSERT INTO UserCategories (UserID, CategoryID) VALUES ('$userID', '$categoryID')";

 if ($connection->query($sql) === TRUE) {
     echo "New record created successfully in UserCategories";
 } else {
     echo "Error: " . $sql . "<br>" . $connection->error;
 }

