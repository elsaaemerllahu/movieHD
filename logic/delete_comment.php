<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        http_response_code(403);
        echo json_encode(['status' => 'error', 'message' => 'Forbidden']);
        exit;
    }

    if (!isset($_POST['comment_id']) || !is_numeric($_POST['comment_id'])) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid comment ID']);
        exit;
    }

    $comment_id = intval($_POST['comment_id']);

    $stmt = $conn->prepare("DELETE FROM movie_reviews WHERE id = ?");
    $stmt->bind_param("i", $comment_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Comment deleted']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Error deleting comment']);
    }

    $stmt->close();
    $conn->close();
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
exit;
