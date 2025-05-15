<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize response array
    $response = ['success' => false, 'message' => ''];
    
    // Validate and sanitize inputs
    $username = isset($_POST['username']) ? trim(strip_tags($_POST['username'])) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate required fields
    if (empty($username) || empty($password)) {
        header("Location: ../login.php?error=Të gjitha fushat janë të detyrueshme");
        exit;
    }

    // Validate username format (alphanumeric and underscore only, 3-20 chars)
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        header("Location: ../login.php?error=Username format i pavlefshëm");
        exit;
    }

    try {
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, username, password, role FROM user WHERE username = ? LIMIT 1");
        if (!$stmt) {
            throw new Exception("Database error");
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = htmlspecialchars($user['username']);
                $_SESSION['role'] = htmlspecialchars($user['role']);
                
                // Regenerate session ID to prevent session fixation
                session_regenerate_id(true);

                header("Location: ../index.php");
                exit;
            } else {
                header("Location: ../login.php?error=Fjalëkalim i pasaktë");
                exit;
            }
        } else {
            header("Location: ../login.php?error=Përdoruesi nuk ekziston");
            exit;
        }
    } catch (Exception $e) {
        error_log("Login error: " . $e->getMessage());
        header("Location: ../login.php?error=Një gabim ndodhi. Ju lutem provoni përsëri");
        exit;
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
    }
}
?>

