<?php
session_start();
require_once "./logic/config.php";

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_SESSION['user_id'];
    $movieId = $_POST['movie_id'] ?? null;
    $title = $_POST['title'] ?? '';
    $poster = $_POST['poster_path'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $releaseDate = $_POST['release_date'] ?? '';

    if (!$movieId || !$title || !$poster) {
        echo json_encode(['status' => 'error', 'message' => 'Missing movie data.']);
        exit();
    }

    $stmt = $conn->prepare("INSERT IGNORE INTO watchlist (user_id, movie_id, title, poster_path, genre, release_date)
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss", $userId, $movieId, $title, $poster, $genre, $releaseDate);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Movie added to watchlist.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add movie.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
