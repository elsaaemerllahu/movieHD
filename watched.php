<?php
session_start();
if (isset($_SESSION['message'])) {
  echo "<div style='color: green; text-align: center;'>{$_SESSION['message']}</div>";
  unset($_SESSION['message']);
}



$isLoggedIn = isset($_SESSION['user_id']);
if (!$isLoggedIn) {
  die("<div class='text-center text-danger mt-5'>Ju lutemi identifikoheni për të parë filmat që keni shikuar.</div>");
}
require './logic/config.php'; // connection to DB

$userId = $_SESSION['user_id']; // make sure this is set at login

$query = $conn->prepare("SELECT * FROM watched_movies WHERE user_id = ? ORDER BY id DESC");
$query->bind_param("i", $userId);
$query->execute();
$result = $query->get_result();
$movies = [];

while ($row = $result->fetch_assoc()) {
  $movies[] = $row;
}
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/global.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <title>Lista e Shikuar</title>
  <style>
    .movie-item {
      padding: 10px;
      margin: 10px;
    }
    .delete-button {
      background-color: red;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }
    .container-watched {
      margin: 0 auto;
      padding: 20px;
      align-items: flex-start;
    }
    .container-text {
      color: white;
      font-size: 2rem;
      margin-bottom: 20px;
      margin-left: 5%;
    }
    .movies-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
      gap: 15px;
      max-width: 1500px;
      margin: 0 auto;
    }
    .movie-item {
      flex: 0 0 calc(32% - 10px);
      box-sizing: border-box;
    }
    @media (max-width: 768px) {
      .movie-item {
        flex: 0 0 calc(50% - 15px);
      }
    }
    @media (max-width: 480px) {
      .movie-item {
        flex: 0 0 100%;
      }
    }
  </style>
</head>
<body style="background-color:#000;">
  <div class="container-watched" style="margin: 0 auto;">
    <h2 class="container-text">Lista e Shikuar</h2>
    <div class="movies-container">
      <?php foreach ($movies as $movie): ?>
        <div class="movie-item" id="movie-<?= $movie['id'] ?>">
          <div class="card bg-dark text-white h-100">
            <img src="<?= htmlspecialchars($movie['movie_poster'] ?? 'default.jpg') ?>"
               class="card-img-top" alt="Poster" style="height: 600px; object-fit: cover;">
            <div class="card-body d-flex flex-row justify-content-between align-items-center">
              <h5 class="card-title"><?= htmlspecialchars($movie['movie_title']) ?></h5>
              <button
                class="btn btn-danger mt-auto delete-button"
                data-id="<?= $movie['id'] ?>"
                data-movie-container-id="movie-<?= $movie['id'] ?>"
              >
                Hiqe nga të shikuara
              </button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if (empty($movies)): ?>
      <p class="text-white text-center mt-5">Nuk ka asnjë film në listë.</p>
    <?php endif; ?>
  </div>
  <?php include 'footer.php'?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const deleteButtons = document.querySelectorAll('.delete-button');
      deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
          const movieId = this.dataset.id;
          const containerId = this.dataset.movieContainerId;
          fetch('remove_watched.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `movie_id=${movieId}`
          })
          .then(response => response.text())
          .then(data => {
            if (data.trim() === 'success') {
              const movieCard = document.getElementById(containerId);
              if (movieCard) {
                movieCard.style.transition = 'opacity 0.3s ease';
                movieCard.style.opacity = '0';
                setTimeout(() => movieCard.remove(), 300);
              }
            } else {
              alert('Gabim gjate heqjes se filmit.');
            }
          })
          .catch(err => {
            alert('Server error.');
            console.error(err);
          });
        });
      });
    });
  </script>
</body>
</html>
