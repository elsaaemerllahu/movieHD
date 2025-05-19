<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #1a1a1a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .logout-container {
            text-align: center;
            color: white;
            padding: 20px;
            border-radius: 10px;
            background-color: #2a2a2a;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }
        .spinner {
            width: 40px;
            height: 40px;
            margin: 20px auto;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #de1002;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Duke u çkyçur...</h2>
        <div class="spinner"></div>
    </div>
    <script>
        setTimeout(function() {
            alert("U çkyçët me sukses!");
            window.location.href = "../login.php";
        }, 500);
    </script>
</body>
</html>