<?php
include '../settings/connection.php';

$bookId = $_POST['bookId'];
$userId = $_POST['userId'];

// Fetch the existing review from the database
$query = "SELECT ReviewText, Rating FROM reviews WHERE UserID = ? AND BookID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param('ii', $userId, $bookId);
$stmt->execute();
$result = $stmt->get_result();
$existingReview = $result->fetch_assoc();

$stmt->close();

if (isset($_POST['rating']) || isset($_POST['reviewText'])) {
    // Use the existing review text and rating as defaults if no new value is provided
    $rating = isset($_POST['rating']) && $_POST['rating'] !== 'no-rating' ? $_POST['rating'] : null;
    if ($rating === 0) {
        $rating = null;
    }
    $reviewText = $_POST['reviewText'] ?? ($existingReview ? $existingReview['ReviewText'] : null);

    $query = "INSERT INTO reviews (UserID, BookID, ReviewText, Rating, ReviewDate)
              VALUES (?, ?, ?, ?, CURDATE())
              ON DUPLICATE KEY UPDATE ReviewText = VALUES(ReviewText), Rating = VALUES(Rating)";

    $stmt = $connection->prepare($query);
    $stmt->bind_param('iisi', $userId, $bookId, $reviewText, $rating);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo 'Review submitted successfully.';
    } else {
        echo 'There was an error submitting your review.';
    }

    $stmt->close();
}
