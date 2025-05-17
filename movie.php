<?php
session_start(); // enable session

include './logic/config.php'; // your DB connection

$isLoggedIn = isset($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Movie Details</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/font-awesome.min.css" rel="stylesheet" >
    <link href="css/global.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
  <style>
    .col_red { color: #e50914; } 
    .line, .hr_1 { border-top: 1px solid #444; }
    .bg_grey { background-color: #1c1c1c; }
    .progress-bar { background-color: #e50914; }
    .watched-form {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 20px;
    }
    @media (max-width: 767.98px) {
      .watched-form {
        width: 90%;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
      }
      #play .play2.row {
        flex-direction: column;
      }
      #play .col-md-4, #play .col-md-8 {
        max-width: 100%;
        flex: 0 0 100%;
      }
      #moviePoster {
        height: auto !important;
        max-width: 100%;
      }
      .play2r {
        padding: 20px !important;
      }
      .play2ri .col-md-6 {
        max-width: 100%;
        flex: 0 0 100%;
        margin-bottom: 20px;
      }
      .btn-sm {
        font-size: 14px;
        padding: 8px 12px;
      }
      textarea.form-control {
        font-size: 14px;
      }
      /* Adjust alert width */
      #alert-container {
        width: 90vw !important;
        max-width: none !important;
        right: 5vw !important;
      }
    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 991.98px) {
      #play .play2.row {
        flex-wrap: wrap;
      }
      #play .col-md-4 {
        max-width: 40%;
        flex: 0 0 40%;
      }
      #play .col-md-8 {
        max-width: 60%;
        flex: 0 0 60%;
      }
      #moviePoster {
        height: auto !important;
        max-width: 100%;
      }
      .play2ri .col-md-6 {
        max-width: 50%;
        flex: 0 0 50%;
      }
      .play2r {
        padding: 30px !important;
      }
    }

    /* Larger screens (desktops and up) */
    @media (min-width: 992px) {
      #moviePoster {
        height: 515px !important;
      }
    }
  </style>
</head>
<body>
<?php
include 'header.php'; // Include the header file
?>
<section id="play">
  <div class="clearfix" style="background-color:rgb(0, 0, 0); padding: 50px 0;">
    <div class="container">
      <div class="play2 row mt-4">
        <div class="col-md-4 p-0">
          <div class="play2l">
            <div class="grid clearfix">
              <figure class="effect-jazz mb-0">
                <a href="#"><img id="moviePoster" src="" height="515" class="w-100" alt="Movie Poster"></a>
              </figure>
            </div>
          </div>
        </div>

        <div class="col-md-8 p-0">
          <div class="play2r bg_grey p-4">
            <h5 style="color:rgb(219, 219, 219); font-size: 24px; font-weight: bold;">
              <span class="col_red">MOVIE DETAILS:</span> <br><br>
              <span id="movieTitle">Loading...</span> <br><br>
            </h5>
            <h5 class="mt-3" id="movieGenre" style="color:rgb(219, 219, 219);">Genre</h5>
            <hr class="line">
            <p class="mt-3" id="movieOverview">Loading description...</p> <br>

            <div class="play2ri row mt-4">
              <div class="col-md-6">
                <div class="play2ril" style="color:rgb(219, 219, 219);">
                  <h6 class="fw-normal">Running Time: <span class="pull-right" id="movieRuntime">...</span></h6>
                  <hr class="hr_1">
                  <h6 class="fw-normal">Genre: <span class="pull-right" id="genreList">...</span></h6>
                  <hr class="hr_1">
                  <h6 class="fw-normal">Release Date: <span class="pull-right" id="releaseDate">...</span></h6>
                  <hr class="hr_1 mb-0"> <br>
                </div>
              </div>
              <div class="col-md-6">
                <div class="play2rir text-white">
                  <h6 class="fw-bold mb-2">IMDb Rating</h6>
                  <div class="progress mb-3" style="height: 18px; background-color: #333;">
                    <div class="progress-bar bg-danger" id="imdbProgress" style="width: 0%;" role="progressbar"></div>
                  </div>
                  <div class="gap-2 watched-form">
                    <?php if ($isLoggedIn): ?>
                      <form id="watchForm" method="POST" action="add_to_watched.php" class="flex-grow-1">
                        <input type="hidden" name="movie_id" id="formMovieId">
                        <input type="hidden" name="movie_title" id="formMovieTitle">
                        <input type="hidden" name="movie_poster" id="formMoviePoster">
                        <button type="submit" class="btn btn-danger btn-sm ">
                          <i class="fa fa-plus me-2"></i> Shto në listën e shikuar
                        </button>
                      </form>

                      <button class="btn btn-danger btn-sm flex-grow-1">
                        <i class="fa fa-plus me-2"></i> Add to Watchlist
                      </button>

                    <?php else: ?>
                      <div class="alert alert-warning text-center w-100">
                        Please log in to add movies to your watchlist or mark them as watched.
                      </div>
                    <?php endif; ?>
                  </div>

                  <!-- Alert container outside of button flex container -->
                  <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 1050; width: 300px;"></div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div> 
      
      <!-- WATCHLIST AND COMMENTS (OUTSIDE) -->
      <div class="bg_grey mt-4 p-4" style="border-radius: 8px;">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h6 class="text-white mb-2">Comments</h6>
                <div class="d-flex flex-column flex-sm-row align-items-start gap-2 align-items-center">

                <textarea class="form-control" placeholder="Add a comment..." rows="1" style="resize: none; flex: 1; padding:10px"></textarea>
                <button class="btn btn-primary" style="padding: 10px 50px; align-items: right">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const movieId = urlParams.get('id');
  const apiKey = '5b3121364d29d3b272e13672cd8c9078'; 
  const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';

  const form = document.getElementById('watchForm');
  const alertContainer = document.getElementById('alert-container');

function showAlert(message, type = 'success') {
  const alert = document.createElement('div');
  alert.className = `alert fade show`;
  alert.role = 'alert';

  // Center and style alert container
  alert.style.position = 'fixed';
  alert.style.top = '20px';
  alert.style.left = '50%';
  alert.style.transform = 'translateX(-50%)';
  alert.style.zIndex = '1050';
  alert.style.minWidth = '320px';
  alert.style.maxWidth = '90vw';
  alert.style.textAlign = 'center';
  alert.style.borderRadius = '8px';
  alert.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
  alert.style.fontFamily = `'Segoe UI', Tahoma, Geneva, Verdana, sans-serif`;
  alert.style.fontWeight = '500';
  alert.style.padding = '12px 20px';
  alert.style.transition = 'opacity 0.4s ease, transform 0.4s ease';

  // Use subtle neutral tones for background and text color
  if (type === 'success') {
    alert.style.backgroundColor = '#e0f2e9';  // very light green
    alert.style.color = '#2a5d34';            // dark muted green
    alert.style.border = '1px solid #b6d8bb';
  } else if (type === 'danger') {
    alert.style.backgroundColor = '#f6e2e2';  // very light red/pink
    alert.style.color = '#8b2e2e';            // dark muted red
    alert.style.border = '1px solid #e4b7b7';
  } else {
    alert.style.backgroundColor = '#f2f2f2';  // light neutral gray
    alert.style.color = '#555';                // medium gray text
    alert.style.border = '1px solid #d2d2d2';
  }

  alert.textContent = message;
  alertContainer.appendChild(alert);

  // Animate fade out and slide up before removing
  setTimeout(() => {
    alert.style.opacity = '0';
    alert.style.transform = 'translateX(-50%) translateY(-20px)';
    alert.addEventListener('transitionend', () => alert.remove());
  }, 4000);
}



  form.addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData
      });
      const data = await response.json();

      if (data.success) {
        showAlert(data.message, 'success');
      } else {
        showAlert(data.message, 'warning');
      }
    } catch (error) {
      showAlert('Something went wrong. Please try again.', 'danger');
      console.error(error);
    }
  });

    document.addEventListener('DOMContentLoaded', () => {
    // Fill hidden inputs after movie details load
    const urlParams = new URLSearchParams(window.location.search);
    const movieId = urlParams.get('id');

    async function loadMovieDetails() {
      const apiKey = '5b3121364d29d3b272e13672cd8c9078';
      const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';
      try {
        const res = await fetch(`https://api.themoviedb.org/3/movie/${movieId}?api_key=${apiKey}&language=en-US`);
        const movie = await res.json();

        document.getElementById('moviePoster').src = IMAGE_BASE_URL + movie.poster_path;
        document.getElementById('movieTitle').textContent = movie.title;
        document.getElementById('movieOverview').textContent = movie.overview;
        document.getElementById('movieRuntime').textContent = `${movie.runtime} min`;
        document.getElementById('releaseDate').textContent = movie.release_date;

        const genres = movie.genres.map(g => g.name).join(', ');
        document.getElementById('genreList').textContent = genres;
        document.getElementById('movieGenre').textContent = genres;

        const imdbPercent = Math.round((movie.vote_average / 10) * 100);
        document.getElementById('imdbProgress').style.width = imdbPercent + '%';
        document.getElementById('imdbProgress').textContent = imdbPercent + '%';

        // Fill hidden form inputs
        document.getElementById('formMovieId').value = movie.id;
        document.getElementById('formMovieTitle').value = movie.title;
        document.getElementById('formMoviePoster').value = IMAGE_BASE_URL + movie.poster_path;

      } catch (err) {
        console.error('Error fetching movie:', err);
      }
    }
    loadMovieDetails();

    // AJAX submit form
    document.getElementById('watchedForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const formData = new FormData(this);

      fetch('add_to_watched.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        const feedback = document.getElementById('watchedFeedback');
        if (data.success) {
          feedback.style.color = 'limegreen';
          feedback.textContent = data.message;
        } else {
          feedback.style.color = 'orange';
          feedback.textContent = data.message;
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });

  async function loadMovieDetails() {
    try {
      const res = await fetch(`https://api.themoviedb.org/3/movie/${movieId}?api_key=${apiKey}&language=en-US`);
      const movie = await res.json();

      document.getElementById('moviePoster').src = IMAGE_BASE_URL + movie.poster_path;
      document.getElementById('movieTitle').textContent = movie.title;
      document.getElementById('movieOverview').textContent = movie.overview;
      document.getElementById('movieRuntime').textContent = `${movie.runtime} min`;
      document.getElementById('releaseDate').textContent = movie.release_date;
      
      const genres = movie.genres.map(g => g.name).join(', ');
      document.getElementById('genreList').textContent = genres;
      document.getElementById('movieGenre').textContent = genres;

      const imdbPercent = Math.round((movie.vote_average / 10) * 100);
      document.getElementById('imdbProgress').style.width = imdbPercent + '%';
      document.getElementById('imdbProgress').textContent = imdbPercent + '%';
    } catch (err) {
      console.error('Error fetching movie:', err);
    }
  }

  loadMovieDetails();
</script>

</body>
</html>
