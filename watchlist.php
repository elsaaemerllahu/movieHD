<?php
session_start();
require_once "logic/config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM watchlist WHERE user_id = ? ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$watchlist = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Për t'u parë</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:rgb(0, 0, 0);">
<?php include 'header.php'; ?>

<section id="trend" class="pt-4 pb-5">
    <div class="container">
        <div class="row trend_1">
            <div class="col-md-6 col-6">
                <div class="trend_1l">
                    <h4 class="mb-0">
                        
                    <span class="col_red">Për t'u parë</span>
                    </h4>
                </div>
            </div>
            
        </div>

        <div class="row mt-4" id="familyMovies">
            <?php if (empty($watchlist)): ?>
                <div class="col-12">
                    <p class="text-center text-muted">Your watchlist is empty.</p>
                </div>
            <?php else: ?>
                <?php foreach ($watchlist as $movie): ?>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="trend_2im clearfix position-relative">
                            <div class="trend_2im1 clearfix">
                                <a href="movie.php?id=<?= $movie['movie_id'] ?>">
                                    <img src="https://image.tmdb.org/t/p/w500<?= htmlspecialchars($movie['poster_path']) ?>" class="w-100" alt="<?= htmlspecialchars($movie['title']) ?>">
                                </a>
                            </div>
                            <div class="trend_2im2 clearfix text-center position-absolute w-100 bottom-0 start-0">
                            <div class="bg-black bg-opacity-75 text-white py-2">
                                <h6 class="mb-1">
                                    <a href="movie.php?id=<?= $movie['movie_id'] ?>" class="text-white text-decoration-none">
                                        <?= htmlspecialchars($movie['title']) ?>
                                    </a>
                                </h6>
                                <a href="remove_from_watchlist.php?movie_id=<?= $movie['movie_id'] ?>" class="btn btn-danger">
                                     Remove
                                </a>
                            </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
