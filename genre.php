<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zhanra</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" >
  <link href="css/font-awesome.min.css" rel="stylesheet" >
  <link href="css/global.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
  // Get genre ID and title from URL
  $genreId = isset($_GET['genre']) ? $_GET['genre'] : '28'; // Default: Action
  $genreTitle = isset($_GET['title']) ? $_GET['title'] : 'Action';
?>

<section class="pt-4 pb-5" style="background-color:rgb(0, 0, 0);">
  <div class="container">
    <h2 style="color:white;">Filmat '<?php echo htmlspecialchars($genreTitle); ?>'</h2>
    <div class="row mt-4" id="genreMovies">
      <!-- Movies will be inserted here -->
    </div>
    <div class="text-center mt-4">
    <<div class="text-center mt-4">
  <button id="loadMoreBtn" class="btn btn-primary">Shiko me shume</button>
  <div id="loadingIndicator" class="mt-3 d-none">
    <div class="spinner-border text-primary" role="status"></div>
    <div class="text-white mt-2">Duke ngarkuar filmat...</div>
  </div>
</div>


    </div>
  </div>
</section>

<script>
const apiKey = '5b3121364d29d3b272e13672cd8c9078';
const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';
const genreId = '<?php echo $genreId; ?>';
let currentPage = 1;
let totalLoadedMovies = 0;
const MAX_MOVIES = 50;

async function loadGenreMovies(page) {
  const btn = document.getElementById('loadMoreBtn');
  const loader = document.getElementById('loadingIndicator');

  // Hide button, show loader
  btn.classList.add('d-none');
  loader.classList.remove('d-none');

  if (totalLoadedMovies >= MAX_MOVIES) return;

  try {
    const response = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&with_genres=${genreId}&language=en-US&page=${page}`);
    const data = await response.json();

    const container = document.getElementById('genreMovies');

    data.results.forEach(movie => {
      if (totalLoadedMovies >= MAX_MOVIES) return;

      const col = document.createElement('div');
      col.classList.add('col-md-2', 'col-6', 'mb-4');

      col.innerHTML = `
        <div class="trend_2im clearfix position-relative">
          <div class="trend_2im1 clearfix">
            <div class="grid">
              <figure class="effect-jazz mb-0">
                <a href="movie.php?id=${movie.id}"><img src="${IMAGE_BASE_URL}${movie.poster_path}" class="w-100" alt="${movie.title}"></a>
              </figure>
            </div>
          </div>
          <div class="trend_2ilast bg_grey p-2 clearfix">
            <h6><a class="col_red" href="movie.php?id=${movie.id}">${movie.title}</a></h6>
          </div>
        </div>
      `;
      container.appendChild(col);
      totalLoadedMovies++;
    });

    if (totalLoadedMovies >= MAX_MOVIES || currentPage >= data.total_pages) {
      btn.style.display = 'none';
    } else {
      btn.classList.remove('d-none');
    }

  } catch (error) {
    console.error('Gabim gjate ngarkimit te filmave:', error);
    btn.classList.remove('d-none');
  } finally {
    loader.classList.add('d-none');
  }
}

document.addEventListener('DOMContentLoaded', () => {
  loadGenreMovies(currentPage);
  document.getElementById('loadMoreBtn').addEventListener('click', () => {
    currentPage++;
    loadGenreMovies(currentPage);
  });
});
</script>

</body>
</html>
