<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MovieHD - Search Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/search.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php include '../header.php'; ?>

<section id="trend" class="pt-4 pb-5">
    <div class="container">
        <?php
        if (isset($_GET['term'])) {
            $term = $_GET['term'];
            $apiKey = "989d10913c450821941d3836a8fbbac7";
            $url = "https://api.themoviedb.org/3/search/movie?api_key=$apiKey&query=" . urlencode($term);

            $response = file_get_contents($url);
            $data = json_decode($response, true);

            echo "<div class='row trend_1'>";
            echo "<div class='col-md-6'>";
            echo "<div class='trend_1l'>";
            echo "<h4 class='mb-0'><i class='fa fa-search col_red me-1'></i> Search Results for: <span class='col_red'>" . htmlspecialchars($term) . "</span></h4>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            if (!empty($data['results'])) {
                echo "<div class='row mt-4'>";
                foreach ($data['results'] as $movie) {
                    echo "<div class='col-md-3 col-6 mb-4'>";
                    echo "<div class='movie-card'>";
                    // Views count at the top
                    echo "<div class='views-count'>" . rand(1, 100) . " Views</div>";
                    // Movie poster with overlay effect
                    echo "<div class='movie-poster'>";
                    if ($movie['poster_path']) {
                        echo "<img src='https://image.tmdb.org/t/p/w500" . $movie['poster_path'] . "' alt='" . htmlspecialchars($movie['title']) . "'>";
                    } else {
                        echo "<img src='../img/no-poster.jpg' alt='No poster available'>";
                    }
                    echo "</div>";
                    // Movie info
                    echo "<div class='movie-info'>";
                    echo "<h3><a href='../movie.php?id=" . $movie['id'] . "'>" . htmlspecialchars($movie['title']) . "</a></h3>";
                    // Truncate overview to 100 characters
                    $overview = strlen($movie['overview']) > 100 ? substr($movie['overview'], 0, 97) . '...' : $movie['overview'];
                    echo "<p>" . htmlspecialchars($overview) . "</p>";
                    // Rating stars
                    echo "<div class='rating'>";
                    $rating = round($movie['vote_average'] / 2); // Convert to 5-star rating
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo "<i class='fa fa-star'></i>";
                        } else {
                            echo "<i class='fa fa-star-o'></i>";
                        }
                    }
                    echo "</div>";
                    echo "</div>"; // End movie-info
                    echo "</div>"; // End movie-card
                    echo "</div>"; // End col
                }
                echo "</div>";
            } else {
                echo "<div class='no-results mt-4'>";
                echo "<h5 class='text-center'><i class='fa fa-film col_red'></i> No movies found matching: <span class='col_red'>" . htmlspecialchars($term) . "</span></h5>";
                echo "</div>";
            }
        } else {
            echo "<div class='no-results mt-4'>";
            echo "<h5 class='text-center'><i class='fa fa-search col_red'></i> Please enter a search term</h5>";
            echo "</div>";
        }
        ?>
    </div>
</section>

<?php include '../footer.php'; ?>

</body>
</html>

