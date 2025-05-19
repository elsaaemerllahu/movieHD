<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$userId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
if ($userId > 0) {
    // Prevent admin from deleting themselves
    if ($userId == $_SESSION['user_id']) {
        echo json_encode(['status' => 'error', 'message' => 'You cannot delete yourself!']);
        exit;
    }
    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->close();
    echo json_encode(['status' => 'success', 'message' => 'User deleted']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid user ID']);
}
?>
