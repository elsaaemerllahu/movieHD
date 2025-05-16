<?php
session_start();
include 'logic/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Përditëso të dhënat nëse forma është dorëzuar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';

    // Përditëso username dhe email
    $sql = "UPDATE user SET username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $user_id);
    $stmt->execute();

    // Nëse është plotësuar fjalëkalimi i ri, kontrollo të vjetrin dhe përditëso
    if (!empty($currentPassword) && !empty($newPassword)) {
        // Merre fjalëkalimin aktual nga databaza
        $sql = "SELECT password FROM user WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $userPasswordData = $result->fetch_assoc();

        // Krahaso fjalëkalimin aktual me atë në databazë
        if (password_verify($currentPassword, $userPasswordData['password'])) {
            // Ruaj fjalëkalimin e ri të hash-uar
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $hashedPassword, $user_id);
            $stmt->execute();

            $success = "Profili dhe fjalëkalimi u përditësuan me sukses!";
        } else {
            $error = "Fjalëkalimi aktual nuk është i saktë.";
        }
    } else {
        $success = "Profili u përditësua me sukses!";
    }
}



// Merr të dhënat aktuale nga databaza
$sql = "SELECT username, email, role FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profili im</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:rgb(0, 0, 0);">

<?php include 'header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="movie_card p-4 rounded-4">
                <h2 class="text-white mb-4">Profili im</h2>

                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?= $success ?></div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <label class="form-label text-white">Username:</label>
                        <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Email:</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Roli:</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($user['role']) ?>" readonly>
                    </div>
                        <hr class="text-white">

    <div class="mb-3">
        <label class="form-label text-white">Fjalëkalimi aktual:</label>
        <input type="password" name="current_password" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label text-white">Fjalëkalimi i ri:</label>
        <input type="password" name="new_password" class="form-control">
    </div>

                    <button type="submit" class="btn btn-warning">Ruaj ndryshimet</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
