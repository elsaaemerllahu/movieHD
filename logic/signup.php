<?php 
session_start();
require 'config.php';

// Verify database connection
if (!isset($conn) || $conn->connect_error) {
    error_log("Database connection failed: " . ($conn->connect_error ?? 'Connection not established'));
    $_SESSION['error'] = "Lidhja me databazën dështoi. Ju lutem provoni përsëri.";
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize inputs
    $username = isset($_POST['username']) ? trim(strip_tags($_POST['username'])) : '';
    $email = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate required fields
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "Të gjitha fushat janë të detyrueshme";
        header("Location: ../login.php");
        exit;
    }

    // Validate username format (alphanumeric and underscore only, 3-20 chars)
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $_SESSION['error'] = "Username duhet të përmbajë vetëm shkronja, numra dhe underscore (_), 3-20 karaktere";
        header("Location: ../login.php");
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Email format i pavlefshëm";
        header("Location: ../login.php");
        exit;
    }

    // Validate password strength (at least 8 chars, 1 uppercase, 1 lowercase, 1 number)
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        $_SESSION['error'] = "Fjalëkalimi duhet të ketë të paktën 8 karaktere, një shkronjë të madhe, një të vogël dhe një numër";
        header("Location: ../login.php");
        exit;
    }

    try {
        // Check if username or email already exists
        $checkStmt = $conn->prepare("SELECT id FROM user WHERE username = ? OR email = ? LIMIT 1");
        if (!$checkStmt) {
            throw new Exception("Database error");
        }

        $checkStmt->bind_param("ss", $username, $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $_SESSION['error'] = "Ky emër përdoruesi ose email ekziston tashmë";
            header("Location: ../login.php");
            exit;
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

        // Set default role
        $role = "user";

        // Insert new user with prepared statement
        $insertStmt = $conn->prepare("INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)");
        if (!$insertStmt) {
            throw new Exception("Database error");
        }

        $insertStmt->bind_param("ssss", $username, $email, $hashedPassword, $role);

        if ($insertStmt->execute()) {
            // Redirect to login page with success message
            $_SESSION['success'] = "Regjistrimi u krye me sukses! Ju lutem identifikohuni.";
            header("Location: ../login.php");
            exit;
        } else {
            throw new Exception("Error inserting user");
        }
    } catch (Exception $e) {
        error_log("Signup error: " . $e->getMessage() . "\n" . 
                  "Stack trace: " . $e->getTraceAsString());
        $_SESSION['error'] = "Një gabim ndodhi: " . $e->getMessage();
        header("Location: ../login.php");
        exit;
    } finally {
        if (isset($checkStmt)) {
            $checkStmt->close();
        }
        if (isset($insertStmt)) {
            $insertStmt->close();
        }
    }
}
?>
