<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Planet</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php include 'header.php'; ?>
<section id="center" class="center_home">
	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-indicators" id="carouselIndicators"></div>
	  <div class="carousel-inner" id="carouselItems"></div>
  
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="z-index: 1000; position: absolute;">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="z-index: 1000; position: absolute;">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	  </button>
	</div>
  </section>  

  <section id="trend" class="pt-4 pb-5">
	<div class="container">
	  <div class="row trend_1">
		<div class="col-md-6 col-6">
		  <div class="trend_1l">
			<h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Latest <span class="col_red">Family Movies</span></h4>
		  </div>
		</div>
		<div class="col-md-6 col-6">
		  <div class="trend_1r text-end">
			<h6 class="mb-0"><a class="button" href="genre.php?genre=10751&title=Family">View All</a></h6>
		  </div>
		</div>
	  </div>
  
	  <div class="row mt-4" id="familyMovies">
		<!-- 4 family movies will be inserted here -->
	  </div>
	   
	</div>
  </section>

  <section id="trend" class="pt-4 pb-5">
	<div class="container">
	  <div class="row trend_1">
		<div class="col-md-6 col-6">
		  <div class="trend_1l">
			<h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Latest <span class="col_red">Drama Movies</span></h4>
		  </div>
		</div>
		<div class="col-md-6 col-6">
		  <div class="trend_1r text-end">
			<h6 class="mb-0"><a class="button" href="genre.php?genre=18&title=Drama">View All</a></h6>
		  </div>
		</div>
	  </div>
  
	  <div class="row mt-4" id="dramaMovies">
		<!-- 4 Drama movies will be inserted here -->
	  </div>
	  
	</div>
  </section>
  
  <section id="trend" class="pt-4 pb-5">
	<div class="container">
	  <div class="row trend_1">
		<div class="col-md-6 col-6">
		  <div class="trend_1l">
			<h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Latest <span class="col_red">Action Movies</span></h4>
		  </div>
		</div>
		<div class="col-md-6 col-6">
		  <div class="trend_1r text-end">
			 <h6 class="mb-0"><a class="button" href="genre.php?genre=28&title=Action">View All</a></h6>
		  </div>
		</div>
	  </div>
  
	  <div class="row mt-4" id="actionMovies">
		<!-- 4 action movies will be inserted here -->
	  </div>
  
	</div>
  </section>
  
  <section id="trend" class="pt-4 pb-5">
	<div class="container">
	  <div class="row trend_1">
		<div class="col-md-6 col-6">
		  <div class="trend_1l">
			<h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Latest <span class="col_red">Mystery Movies</span></h4>
		  </div>
		</div>
		<div class="col-md-6 col-6">
		  <div class="trend_1r text-end">
			 <h6 class="mb-0"><a class="button" href="genre.php?genre=9648&title=Mystery">View All</a></h6>
		  </div>
		</div>
	  </div>
  
	  <div class="row mt-4" id="mysteryMovies">
		<!-- 4 action movies will be inserted here -->
	  </div>
  
	</div>
  </section>

<section id="play">
	<div class="clearfix" style="background-color:rgb(0, 0, 0); padding: 50px 0;">
		<div class="container">
		<div class="play2 row mt-4">
			<div class="col-md-4 p-0">
			<div class="play2l">
				<div class="grid clearfix">
				<figure class="effect-jazz mb-0">
					<a href="#"><img id="moviePoster" src="" height="515" class="w-100" alt="Best Movie"></a>
				</figure>
				</div>
			</div>
			</div>
			<div class="col-md-8 p-0">
			<div class="play2r bg_grey p-4">
				<h5 style="color:rgb(219, 219, 219); font-size: 24px; font-weight: bold;">
				<span class="col_red">BEST MOVIE OF THE MONTH :</span> <br> <br>
				<span id="movieTitle">Loading...</span> <br><br>
				</h5>
				<h5 class="mt-3" id="movieGenre" style="color:rgb(219, 219, 219);">Genre</h5>
				<hr class="line">
				<p class="mt-3" id="movieOverview">Loading description...</p> <br>
				<div class="play2ri row mt-4">
				<div class="col-md-6" sty>
					<div class="play2ril" style="color:rgb(219, 219, 219);">
					<h6 class="fw-normal">Running Time: <span class="pull-right" id="movieRuntime">...</span></h6>
					<hr class="hr_1">
					<h6 class="fw-normal">Genre: <span class="pull-right" id="genreList">...</span></h6>
					<hr class="hr_1">
					<h6 class="fw-normal">Release Date: <span class="pull-right" id="releaseDate">...</span></h6>
					<hr class="hr_1 mb-0">
					</div>
				</div>
				<div class="col-md-6">
					<div class="play2rir" style="color:rgb(219, 219, 219);">
					<h6 class="fw-normal">IMDb</h6>
					<div class="progress">
						<div class="progress-bar" id="imdbProgress" style="width: 0%;" role="progressbar"></div>
					</div>
					<!-- Add more ratings if needed -->
					</div>
				</div>
				</div>
			</div>
			</div>
		</div> 
		</div>
	</div>
</section>

<section id="footer">
<div class="footer_m clearfix">
 <div class="container">
   <div class="row footer_1">
    <div class="col-md-4">
	 <div class="footer_1i">
	   <h3><a class="text-white" href="index.html"><i class="fa fa-video-camera col_red me-1"></i> Planet</a></h3>
	   <p class="mt-3">Lorem ipsum dolor sit amet consect etur adi pisicing elit sed do eiusmod tempor incididunt. Lorem ipsum dolor sit amet consect etur. </p>
	   <h6 class="fw-normal"><i class="fa fa-map-marker fs-5 align-middle col_red me-1"></i> 5311 Ceaver Sidge Td.
Pakland, DE 13507</h6>
        <h6 class="fw-normal mt-3"><i class="fa fa-envelope fs-5 align-middle col_red me-1"></i> info@gmail.com</h6>
		<h6 class="fw-normal mt-3 mb-0"><i class="fa fa-phone fs-5 align-middle col_red me-1"></i>  +123 123 456</h6>
	 </div>
	</div>
	<div class="col-md-4">
	 <div class="footer_1i">
	  <h4>Flickr <span class="col_red">Stream</span></h4>
      <div class="footer_1i1 row mt-4">
	   <div class="col-md-3 col-3">
	    <div class="footer_1i1i">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/4.jpg" height="70" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		</div>
	   </div>
	   <div class="col-md-3 col-3">
	    <div class="footer_1i1i">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/5.jpg" height="70" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		</div>
	   </div>
	   <div class="col-md-3 col-3">
	    <div class="footer_1i1i">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/6.jpg" height="70" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		</div>
	   </div>
	   <div class="col-md-3 col-3">
	    <div class="footer_1i1i">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/7.jpg" height="70" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		</div>
	   </div>
	  </div>
	  <div class="footer_1i1 row mt-3">
	   <div class="col-md-3 col-3">
	    <div class="footer_1i1i">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/8.jpg" height="70" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		</div>
	   </div>
	   <div class="col-md-3 col-3">
	    <div class="footer_1i1i">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/9.jpg" height="70" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		</div>
	   </div>
	   <div class="col-md-3 col-3">
	    <div class="footer_1i1i">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/10.jpg" height="70" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		</div>
	   </div>
	   <div class="col-md-3 col-3">
	    <div class="footer_1i1i">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/11.jpg" height="70" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		</div>
	   </div>
	  </div>
	 </div>
	</div>
	<div class="col-md-4">
	 <div class="footer_1i">
	  <h4>Sign  <span class="col_red">Newsletter</span></h4>
      <p class="mt-3">Subscribe to our newsletter list to get latest news and updates from us</p>
	  <div class="input-group">
				<input type="text" class="form-control bg-black" placeholder="Email">
				<span class="input-group-btn">
					<button class="btn btn text-white bg_red rounded-0 border-0" type="button">
						 Subscribe</button>
				</span>
		</div>
		<ul class="social-network social-circle mb-0 mt-4">
			<li><a href="#" class="icoRss" title="Rss"><i class="fa fa-instagram"></i></a></li>
			<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-youtube"></i></a></li>
			<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
		</ul>
	 </div>
	</div>
   </div>
</div>
</div>
</section>

<section id="footer_b" class="pt-3 pb-3 bg_grey">
<div class="container">
   <div class="row footer_1">
     <div class="col-md-8">
	  <div class="footer_1l">
	   <p class="mb-0">© 2013 Your Website Name. All Rights Reserved | Design by <a class="col_red" href="http://www.templateonweb.com">TemplateOnWeb</a></p>
	  </div>
	 </div>
	 <div class="col-md-4">
	  <div class="footer_1r">
	   <ul class="mb-0">
	    <li class="d-inline-block me-2"><a href="#">Home</a></li>
		<li class="d-inline-block me-2"><a href="#">Features</a></li>
		<li class="d-inline-block me-2"><a href="#">Pages</a></li>
		<li class="d-inline-block me-2"><a href="#">Portfolio</a></li>
		<li class="d-inline-block me-2"><a href="#">Blog</a></li>
		<li class="d-inline-block"><a href="#">Contact</a></li>
	   </ul>
	  </div>
	 </div>
   </div>
</div>
</section>

<script>
window.onscroll = function() {myFunction()};

var navbar_sticky = document.getElementById("navbar_sticky");
var sticky = navbar_sticky.offsetTop;
var navbar_height = document.querySelector('.navbar').offsetHeight;

function myFunction() {
  if (window.pageYOffset >= sticky + navbar_height) {
    navbar_sticky.classList.add("sticky")
	document.body.style.paddingTop = navbar_height + 'px';
  } else {
    navbar_sticky.classList.remove("sticky");
	document.body.style.paddingTop = '0'
  }
}
</script>

<script>
	const apiKey = '5b3121364d29d3b272e13672cd8c9078';
	const imageBaseUrl = 'https://image.tmdb.org/t/p/original';
	const maxMovies = 3; // Number of movies to show
  
	async function loadPopularMovies() {
	  const response = await fetch(`https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=en-US&page=1`);
	  const data = await response.json();
	  const movies = data.results.slice(0, maxMovies);
  
	  const indicators = document.getElementById('carouselIndicators');
	  const items = document.getElementById('carouselItems');
  
	  movies.forEach((movie, index) => {
		const activeClass = index === 0 ? 'active' : '';
  
		// ⭐ INDICATOR
		indicators.innerHTML += `
		  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="${index}" class="${activeClass}" aria-label="Slide ${index + 1}"></button>
		`;
  
		// ⭐ ITEM
		items.innerHTML += `
  <div class="carousel-item ${activeClass}">
    <img src="${imageBaseUrl + movie.backdrop_path}" class="d-block w-100" alt="${movie.title}">
    <div class="carousel-caption d-md-block text-start" style="left: 0%; right: 0%; bottom: 0; top: 0; background-color: rgba(0, 0, 0, 0.5); padding: 20px;">
      
      <div style="transform: translate(100px, 100px);">
        <h1 class="font_60">${movie.title}</h1>
        
        <h6 class="mt-3">
          <span class="col_red me-3">
            ${'★'.repeat(Math.round(movie.vote_average / 2)) + '☆'.repeat(5 - Math.round(movie.vote_average / 2))}
          </span>
          ${movie.vote_average.toFixed(1)} (TMDB) &nbsp;&nbsp; Year: ${movie.release_date.split('-')[0]}
          <a class="bg_red p-2 pe-4 ps-4 ms-3 text-white d-inline-block" href="#">Popular</a>
        </h6>
        
        <p class="mt-3">${movie.overview}</p>
        
        <h6 class="mt-4">
          <a class="button" href="https://www.youtube.com/results?search_query=${encodeURIComponent(movie.title)} trailer" target="_blank">
            <i class="fa fa-play-circle align-middle me-1"></i> Watch Trailer</a>
        </h6>
      </div>

    </div>
  </div>
`;

	  });
	}
  
	loadPopularMovies();
	const BASE_URL = 'https://api.themoviedb.org/3';
const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';

async function loadFamilyMovies() {
  try {
    const response = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&with_genres=10751&language=en-US&page=1`);
    const data = await response.json();
    const movies = data.results.slice(0, 4); // only 4 movies

    const familyMoviesContainer = document.getElementById('familyMovies');
    familyMoviesContainer.innerHTML = '';

    movies.forEach(movie => {
      const col = document.createElement('div');
      col.classList.add('col-md-3', 'col-6');

      col.innerHTML = `
        <div class="trend_2im clearfix position-relative">
          <div class="trend_2im1 clearfix">
            <div class="grid">
              <figure class="effect-jazz mb-0">
                <a href="movie.php?id=${movie.id}"><img src="${IMAGE_BASE_URL}${movie.poster_path}" class="w-100" alt="${movie.title}"></a>
              </figure>
            </div>
          </div>
        </div>
        <div class="trend_2ilast bg_grey p-3 clearfix">
          <h5><a class="col_red" href="movie.php?id=${movie.id}">${movie.title}</a></h5>
          <p class="mb-2">${movie.overview.substring(0, 60)}...</p>
          <span class="col_red">
            ${renderStars(movie.vote_average)}
          </span>
          <p class="mb-0">${movie.popularity.toFixed(0)} Views</p>
        </div>
      `;

      familyMoviesContainer.appendChild(col);
    });
  } catch (error) {
    console.error('Error fetching movies:', error);
  }
}
async function loadDramaMovies() {
  try {
    const response = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&with_genres=18&language=en-US&page=1`);
    const data = await response.json();
    const movies = data.results.slice(0, 4);

    const dramaMoviesContainer = document.getElementById('dramaMovies');
    dramaMoviesContainer.innerHTML = '';

    movies.forEach(movie => {
      const col = document.createElement('div');
      col.classList.add('col-md-3', 'col-6');

      col.innerHTML = `
        <div class="trend_2im clearfix position-relative">
          <div class="trend_2im1 clearfix">
            <div class="grid">
              <figure class="effect-jazz mb-0">
                <a href="movie.php?id=${movie.id}"><img src="${IMAGE_BASE_URL}${movie.poster_path}" class="w-100" alt="${movie.title}"></a>
              </figure>
            </div>
          </div>
        </div>
        <div class="trend_2ilast bg_grey p-3 clearfix">
          <h5><a class="col_red" href="movie.php?id=${movie.id}">${movie.title}</a></h5>
          <p class="mb-2">${movie.overview.substring(0, 60)}...</p>
          <span class="col_red">
            ${renderStars(movie.vote_average)}
          </span>
          <p class="mb-0">${movie.popularity.toFixed(0)} Views</p>
        </div>
      `;

      dramaMoviesContainer.appendChild(col);
    });
  } catch (error) {
    console.error('Error fetching movies:', error);
  }
}
async function loadActionMovies() {
  try {
    const response = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&with_genres=28&language=en-US&page=1`);
    const data = await response.json();
    const movies = data.results.slice(0, 4); // only 4 movies

    const actionMoviesContainer = document.getElementById('actionMovies');
    actionMoviesContainer.innerHTML = '';

    movies.forEach(movie => {
      const col = document.createElement('div');
      col.classList.add('col-md-3', 'col-6');

      col.innerHTML = `
        <div class="trend_2im clearfix position-relative">
          <div class="trend_2im1 clearfix">
            <div class="grid">
              <figure class="effect-jazz mb-0">
                <a href="#"><img src="${IMAGE_BASE_URL}${movie.poster_path}" class="w-100" alt="${movie.title}"></a>
              </figure>
            </div>
          </div>
        </div>
        <div class="trend_2ilast bg_grey p-3 clearfix">
          <h5><a class="col_red" href="#">${movie.title}</a></h5>
          <p class="mb-2">${movie.overview.substring(0, 60)}...</p>
          <span class="col_red">
            ${renderStars(movie.vote_average)}
          </span>
          <p class="mb-0">${movie.popularity.toFixed(0)} Views</p>
        </div>
      `;

      actionMoviesContainer.appendChild(col);
    });
  } catch (error) {
    console.error('Error fetching action movies:', error);
  }
}
async function loadMysteryMovies() {
  try {
    const response = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&with_genres=9648&language=en-US&page=1`);
    const data = await response.json();
    const movies = data.results.slice(0, 4); // only 4 movies

    const actionMoviesContainer = document.getElementById('mysteryMovies');
    actionMoviesContainer.innerHTML = '';

    movies.forEach(movie => {
      const col = document.createElement('div');
      col.classList.add('col-md-3', 'col-6');

      col.innerHTML = `
        <div class="trend_2im clearfix position-relative">
          <div class="trend_2im1 clearfix">
            <div class="grid">
              <figure class="effect-jazz mb-0">
                <a href="#"><img src="${IMAGE_BASE_URL}${movie.poster_path}" class="w-100" alt="${movie.title}"></a>
              </figure>
            </div>
          </div>
        </div>
        <div class="trend_2ilast bg_grey p-3 clearfix">
          <h5><a class="col_red" href="#">${movie.title}</a></h5>
          <p class="mb-2">${movie.overview.substring(0, 60)}...</p>
          <span class="col_red">
            ${renderStars(movie.vote_average)}
          </span>
          <p class="mb-0">${movie.popularity.toFixed(0)} Views</p>
        </div>
      `;

      actionMoviesContainer.appendChild(col);
    });
  } catch (error) {
    console.error('Error fetching action movies:', error);
  }
}

async function loadBestMovieOfMonth() {
  const today = new Date();
  const firstDay = new Date(today.getFullYear(), today.getMonth(), 1).toISOString().split('T')[0];
  const lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0).toISOString().split('T')[0];

  try {
    const response = await fetch(`https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&sort_by=vote_average.desc&vote_count.gte=100&language=en-US&primary_release_date.gte=${firstDay}&primary_release_date.lte=${lastDay}`);
    const data = await response.json();
    const movie = data.results[0]; // Best movie of the month

    // Fetch more details (like runtime)
    const detailsRes = await fetch(`https://api.themoviedb.org/3/movie/${movie.id}?api_key=${apiKey}&language=en-US`);
    const details = await detailsRes.json();

    // Fill the HTML
    document.getElementById('moviePoster').src = IMAGE_BASE_URL + movie.poster_path;
    document.getElementById('movieTitle').innerText = movie.title;
    document.getElementById('movieOverview').innerText = movie.overview;
    document.getElementById('movieRuntime').innerText = `${details.runtime} mins`;
    document.getElementById('genreList').innerText = details.genres.map(g => g.name).join(', ');
    document.getElementById('movieGenre').innerText = details.genres[0]?.name || 'Genre';
    document.getElementById('releaseDate').innerText = movie.release_date;
    document.getElementById('imdbProgress').style.width = `${movie.vote_average * 10}%`;
  } catch (err) {
    console.error('Error fetching best movie of the month:', err);
  }
}

function renderStars(rating) {
  const starCount = Math.round(rating / 2);
  let starsHTML = '';
  for (let i = 0; i < 5; i++) {
    if (i < starCount) {
      starsHTML += '<i class="fa fa-star"></i> ';
    } else {
      starsHTML += '<i class="fa fa-star-o"></i> ';
    }
  }
  return starsHTML;
}

document.addEventListener('DOMContentLoaded', () => {
  loadFamilyMovies();
  loadDramaMovies();
  loadActionMovies();
  loadMysteryMovies();
  loadBestMovieOfMonth();
});
  </script>
  
</body>

</html>