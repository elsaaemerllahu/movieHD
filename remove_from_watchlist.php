<?php
session_start();
require_once "logic/config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['movie_id'])) {
    $userId = $_SESSION['user_id'];
    $movieId = intval($_GET['movie_id']);

    $stmt = $conn->prepare("DELETE FROM watchlist WHERE user_id = ? AND movie_id = ?");
    $stmt->bind_param("ii", $userId, $movieId);

    $stmt->execute();
    $stmt->close();
}

header("Location: watchlist.php");
exit();
?>
