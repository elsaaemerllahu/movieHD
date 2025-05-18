<?php
session_start();
require 'logic/config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'You must be logged in to submit a review.']);
    exit;
}

$userId = $_SESSION['user_id'];
$movieId = $_POST['movie_id'];
$rating = isset($_POST['rating']) ? (int)$_POST['rating'] : null;
$comment = trim($_POST['comment']);

// Kontroll për vlefshmërinë e rating
if ($rating !== null && ($rating < 1 || $rating > 5)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid rating value.']);
    exit;
}

// 1. Nëse kemi **edhe rating edhe comment**, shtojmë rresht të ri me të dyja
if ($rating !== null && !empty($comment)) {
    $stmt = $conn->prepare("INSERT INTO movie_reviews (user_id, movie_id, rating, comment, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("iiis", $userId, $movieId, $rating, $comment);
    $stmt->execute();
    $stmt->close();
}
// 2. Vetëm rating (pa comment): UPDATE nëse ekziston, ose INSERT nëse jo
elseif ($rating !== null) {
    $stmt = $conn->prepare("SELECT id FROM movie_reviews WHERE user_id = ? AND movie_id = ? AND comment IS NULL");
    $stmt->bind_param("ii", $userId, $movieId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Ekziston rreshti — bëj UPDATE
        $stmt->close();
        $update = $conn->prepare("UPDATE movie_reviews SET rating = ?, created_at = NOW() WHERE user_id = ? AND movie_id = ? AND comment IS NULL");
        $update->bind_param("iii", $rating, $userId, $movieId);
        $update->execute();
        $update->close();
    } else {
        // Shto rresht të ri
        $stmt->close();
        $insert = $conn->prepare("INSERT INTO movie_reviews (user_id, movie_id, rating, comment, created_at) VALUES (?, ?, ?, NULL, NOW())");
        $insert->bind_param("iii", $userId, $movieId, $rating);
        $insert->execute();
        $insert->close();
    }
}
// 3. Vetëm comment (pa rating): shtohet gjithmonë si rresht i ri
elseif (!empty($comment)) {
    $stmt = $conn->prepare("INSERT INTO movie_reviews (user_id, movie_id, rating, comment, created_at) VALUES (?, ?, NULL, ?, NOW())");
    $stmt->bind_param("iis", $userId, $movieId, $comment);
    $stmt->execute();
    $stmt->close();
}

echo json_encode(['status' => 'success', 'message' => 'Review processed successfully.']);
?>
