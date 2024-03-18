<?php
include '../settings/connection.php';
include '../settings/core.php';
$userID = $_SESSION['user_id'];
echo $userID;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status'], $_POST['bookID'])) {
    $newStatus = $_POST['status'];
    $bookID = $_POST['bookID'];

    $query = "SELECT * FROM userbooks WHERE bookID = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $bookID);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    $stmt->close();

    if ($stmt_result->num_rows == 0) {
        $addBookQuery = "INSERT INTO userbooks (UserID, BookID) VALUES (?, ?)";
        $addBookStmt = $connection->prepare($addBookQuery);
        $addBookStmt->bind_param("ii", $userID, $bookID);
        $addBookStmt->execute();
        $addBookStmt->close();
    }

    // Start transaction
    $connection->begin_transaction();

    try {
        // If the user selected 'None', remove the book from all shelves
        if ($newStatus === 'None') {
            $query = "DELETE FROM bookcategories WHERE UserID = ? AND BookID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ii", $userID, $bookID);
            $stmt->execute();
            $stmt->close();
        } else {
            // First, remove any existing category for this book and user
            $delete = "DELETE FROM bookcategories WHERE UserID = ? AND BookID = ?";
            $deleteStmt = $connection->prepare($delete);
            $deleteStmt->bind_param("ii", $userID, $bookID);
            $deleteStmt->execute();
            $deleteStmt->close();

            // Then, insert the new category for this book and user
            $insert = "INSERT INTO bookcategories (UserID, BookID, CategoryID) VALUES (?, ?, ?)";
            $insertStmt = $connection->prepare($insert);
            $insertStmt->bind_param("iii", $userID, $bookID, $newStatus);
            $insertStmt->execute();
            $insertStmt->close();
        }

        // Commit transaction
        $connection->commit();
        echo 'Status updated successfully.';
    } catch (Exception $e) {
        $connection->rollback();
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request.';
}
?>
