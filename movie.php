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
    
    <form id="watchlistForm" method="post" action="add_to_watchlist.php">
  <input type="hidden" name="movie_id" id="formMovieId">
  <input type="hidden" name="title" id="formTitle">
  <input type="hidden" name="poster_path" id="formPosterPath">
  <input type="hidden" name="genre" id="formGenre">
  <input type="hidden" name="release_date" id="formReleaseDate">
  <button type="submit" class="btn btn-warning" >
     Add to Watchlist
  </button>
</form>

</form>

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
  <div class="d-flex align-items-start gap-2">
    <textarea class="form-control" placeholder="Add a comment..." rows="1" style="resize: none; flex: 1; padding:10px"></textarea>
    <button class="btn btn-primary" style="padding: 10px 50px">Submit</button>
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
  const apiKey = '5b3121364d29d3b272e13672cd8c9078'; // <-- Replace this
  const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';

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
      
      
      document.getElementById('formMovieId').value = movie.id;
    document.getElementById('formTitle').value = movie.title;
    document.getElementById('formPosterPath').value = movie.poster_path;
    document.getElementById('formGenre').value = genres;
    document.getElementById('formReleaseDate').value = movie.release_date;
    } catch (err) {
      console.error('Error fetching movie:', err);
    }
  }

  loadMovieDetails();
</script>

<script>
document.getElementById('watchlistForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    const form = e.target;
    const formData = new FormData(form);

    fetch('add_to_watchlist.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('✔️ ' + data.message);
        } else {
            alert('⚠️ ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('❌ Something went wrong.');
    });
});
</script>




</body>
</html>
