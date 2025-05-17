<?php
session_start();
require './logic/config.php'; // DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['movie_id']) && isset($_SESSION['user_id'])) {
    $movieId = intval($_POST['movie_id']);
    $userId = intval($_SESSION['user_id']);

    $stmt = $conn->prepare("DELETE FROM watched_movies WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $movieId, $userId);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
