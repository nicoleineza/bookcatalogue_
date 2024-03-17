<?php
include ('../settings/connection.php');
$userID = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status'], $_POST['bookID'])) {
    $newStatus = $_POST['status'];
    $bookID = $_POST['bookID'];

    $query = "SELECT * FROM userbooks WHERE bookID = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $bookID);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    $stmt->close();

    if ($stmt_result->num_rows == 0) {
        $addBookQuery = "INSERT INTO userbooks (UserID, BookID) VALUES (?, ?)";
        $addBookStmt = $db->prepare($addBookQuery);
        $addBookStmt->bind_param("ii", $userID, $bookID);
        $addBookStmt->execute();
        $addBookStmt->close();
    }

    // Start transaction
    $db->begin_transaction();

    try {
        // If the user selected 'None', remove the book from all shelves
        if ($newStatus === 'None') {
            $query = "DELETE FROM bookcategories WHERE UserID = ? AND BookID = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("ii", $userID, $bookID);
            $stmt->execute();
            $stmt->close();
        } else {
            // First, remove any existing category for this book and user
            $delete = "DELETE FROM bookcategories WHERE UserID = ? AND BookID = ?";
            $deleteStmt = $db->prepare($delete);
            $deleteStmt->bind_param("ii", $userID, $bookID);
            $deleteStmt->execute();
            $deleteStmt->close();

            // Then, insert the new category for this book and user
            $insert = "INSERT INTO bookcategories (UserID, BookID, CategoryID) VALUES (?, ?, ?)";
            $insertStmt = $db->prepare($insert);
            $insertStmt->bind_param("iii", $userID, $bookID, $newStatus);
            $insertStmt->execute();
            $insertStmt->close();
        }

        // Commit transaction
        $db->commit();
        echo 'Status updated successfully.';
    } catch (Exception $e) {
        $db->rollback();
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request.';
}
?>
