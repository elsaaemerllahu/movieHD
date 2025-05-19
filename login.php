<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - MovieHD</title>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Rajdhani', sans-serif;
            background: #0c0c0c;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #1a1a1a;
            border-radius: 10px;
            position: relative; /* For overlay positioning */
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
            overflow: hidden;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 50%;
        }

        .sign-in-container {
            left: 0;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
            opacity: 0;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%, 49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%, 100% {
                opacity: 1;
                z-index: 5;
            }
        }

        form {
            background-color: #1a1a1a; /* Ensure form background is consistent */
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
            text-align: left;
            width: 100%;
        }

        input {
            background-color: #333;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
            border-radius: 6px;
            color: #fff;
        }

        button {
            border-radius: 6px;
            border: 1px solid #ff0000;
            background-color: #ff0000;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            cursor: pointer;
            align-self: flex-start;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #fff;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #ff0000;
            background: linear-gradient(to right, #ff0000, #cc0000);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            text-align: center;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 50%; /* Only half the overlay */
            display: flex;
            flex-direction: column;
            align-items: center;      /* Center horizontally */
            justify-content: center;  /* Center vertically */
            padding: 0 40px;
            text-align: center;
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .overlay-panel h1 {
            font-weight: bold;
            margin: 0;
        }

        .overlay-panel p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        .overlay-panel.overlay-right p {
            width: 100%;
            text-align: left;
        }

        .success-message, .error-message {
            position: absolute;
            top: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            z-index: 1000;
            font-weight: bold;
        }

        .success-message {
            background-color: #2ecc71;
            color: #fff;
        }

        .error-message {
            background-color: #e74c3c;
            color: #fff;
        }

        .overlay-panel.overlay-left {
            left: 10%;
            right: auto;
        }

        .overlay-panel.overlay-right {
            left: auto;
            right: -5%;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['error'])) {
    echo "<div class='error-message'>" . htmlspecialchars($_SESSION['error']) . "</div>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<div class='success-message'>" . htmlspecialchars($_SESSION['success']) . "</div>";
    unset($_SESSION['success']);
}
?>

<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="logic/signup.php" method="post">
            <h1>Krijo llogari</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Regjistrohu</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="logic/login.php" method="post">
            <h1>Mirë se vini!</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Kyçu</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1 >Mirë se vini!</h1>
                
                <button class="ghost" id="signIn">Kyçu</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Përshendetje!</h1>
                <p>Fillo një rrugëtim me ne!</p>
                <button class="ghost" id="signUp">Regjistrohu</button>
            </div>
        </div>
    </div>
</div>

<script src="js/login.js"></script>
</body>
</html>