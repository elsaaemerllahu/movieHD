<?php
session_start();
include './logic/config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $movie_id = $_POST['movie_id'] ?? null;
    $title = $_POST['movie_title'] ?? '';
    $poster = $_POST['movie_poster'] ?? '';

    if (!$movie_id) {
        echo json_encode(['success' => false, 'message' => 'Movie ID missing']);
        exit();
    }

    // Check if already exists
    $stmt = $conn->prepare("SELECT * FROM watched_movies WHERE user_id = ? AND movie_id = ?");
    $stmt->bind_param("ii", $user_id, $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Insert new
        $stmt = $conn->prepare("INSERT INTO watched_movies (user_id, movie_id, movie_title, movie_poster) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $user_id, $movie_id, $title, $poster);
        $stmt->execute();

        echo json_encode(['success' => true, 'message' => 'Movie added to watched list']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Movie already in watched list']);
    }
    exit();
}
