<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Planet</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    </head>
    <body>
    <section id="top">
    <div class="container-fluid d-flex justify-content-center">
    <div class="row align-items-center justify-content-between w-100" style="max-width: 1640px;">
      <div class="col-md-3">
            <div class="top_1l pt-1">
              <h3 class="mb-0">
                <a class="text-white" href="<?php echo (strpos($_SERVER['REQUEST_URI'], 'logic/') !== false) ? '../index.php' : 'index.php'; ?>" style="text-decoration: none;">
                <img src="<?php echo (strpos($_SERVER['REQUEST_URI'], 'logic/') !== false) ? '../img/movie.png' : 'img/movie.png'; ?>" alt="Logo" style="width: 40px;" class="me-1"></i> MovieHD
                </a>
              </h3>
            </div>
          </div>
          <div class="col-md-3 text-md-right">
            <div class="top_1m">
              <div class="input-group">
                <form action="<?php echo (strpos($_SERVER['REQUEST_URI'], 'logic/') !== false) ? 'search.php' : 'logic/search.php'; ?>" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control bg-black text-white" name="term" placeholder="Search Site..." required>
                    <div class="input-group-append">
                      <button class="btn bg_red text-white rounded-0 border-0" type="submit">Search</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="header">
  <nav class="navbar navbar-expand-md navbar-light" id="navbar_sticky">
    <div class="container d-flex justify-content-between align-items-center" style="max-width: 1140px;">
      
      <!-- Logo -->
      <a class="navbar-brand text-white fw-bold" href="<?php echo (strpos($_SERVER['REQUEST_URI'], 'logic/') !== false) ? '../index.php' : 'index.php'; ?>">
        <i class="fa fa-video-camera col_red me-1"></i> MovieHD
      </a>

      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navigation menu -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav mb-0">
          <li class="nav-item"><a class="nav-link <?= $currentPage == 'index.php' ? 'active text-danger' : '' ?>" href="index.php">Ballina</a></li>
          <li class="nav-item"><a class="nav-link <?= $currentPage == 'watchlist.php' ? 'active text-danger' : '' ?>" href="watchlist.php">Për t'u parë</a></li>
          <li class="nav-item"><a class="nav-link <?= $currentPage == 'watched.php' ? 'active text-danger' : '' ?>" href="watched.php">Të shikuarat</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" role="button" data-bs-toggle="dropdown">Zhanre</a>
            <ul class="dropdown-menu drop_1" style="padding: 0;">
              <li><a class="dropdown-item" href="<?php echo (strpos($_SERVER['REQUEST_URI'], 'logic/') !== false) ? '../genre.php?genre=10751&title=Family' : 'genre.php?genre=10751&title=Family'; ?>">Familjarë</a></li>
              <li><a class="dropdown-item" href="<?php echo (strpos($_SERVER['REQUEST_URI'], 'logic/') !== false) ? '../genre.php?genre=28&title=Action' : 'genre.php?genre=28&title=Action'; ?>">Aksion</a></li>
              <li><a class="dropdown-item" href="<?php echo (strpos($_SERVER['REQUEST_URI'], 'logic/') !== false) ? '../genre.php?genre=9648&title=Mystery' : 'genre.php?genre=9648&title=Mystery'; ?>">Mister</a></li>
              <li><a class="dropdown-item" href="<?php echo (strpos($_SERVER['REQUEST_URI'], 'logic/') !== false) ? '../genre.php?genre=18&title=Drama' : 'genre.php?genre=18&title=Drama'; ?>">Drama</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?= $currentPage == 'profil.php' ? 'active text-danger' : '' ?>" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item <?= $currentPage == 'profil.php' ? 'text-danger fw-bold' : '' ?>" href="profil.php">Profili</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="login.php">Çkyçu</a></li>
              </ul>
          </li>

        </ul>
      </div>

    </div>
  </nav>
</section>


    </body>
</html>
