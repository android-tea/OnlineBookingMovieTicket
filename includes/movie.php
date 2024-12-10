<?php
// Include database connection
include('config.php');

// Get movie ID from URL (Assuming URL is movie.php?id=1)
$movie_id = $_GET['id'];

// Query to get movie details from the database
$query = "SELECT * FROM movies WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

// If the movie is found, display it
if ($movie) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $movie['title']; ?> - Movie Website</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="nav-left">
            <img src="logo.png" alt="logo" class="logo">
        </div>
        <div class="nav-center">
            <nav>
                <a href="index.php" class="home-button">Home</a>
                <a href="schedule.php" class="schedule-button">Schedule</a>
                <a href="cinemas.php" class="cinemas-button">Cinemas</a>
                <a href="category.php" class="category-button">Category</a>
            </nav>
        </div>
        <div class="nav-right">
            <input type="search" id="searchBox" placeholder="Search...">
            <input type="image" src="search.png" alt="search" id="searchButton">
        </div>
    </div>

    <!-- Movie Details -->
    <div class="movie-details">
        <h1><?php echo $movie['title']; ?></h1>
        
        <div class="container">
            <?php
            // Loop for star rating
            $rating = $movie['rating']; // Assuming 5 stars max
            for ($i = 1; $i <= 5; $i++) {
                echo $i <= $rating ? '<span class="fa fa-star checked"></span>' : '<span class="fa fa-star"></span>';
            }
            ?>
        </div>

        <div class="genre">
            <p><?php echo $movie['genre']; ?></p>
        </div>

        <div class="poster">
            <img src="images/<?php echo $movie['poster']; ?>" alt="Poster" class="poster-img">
        </div>

        <div class="video-container">
            <iframe 
                width="400"
                height="300"
                src="<?php echo $movie['trailer_url']; ?>"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>

        <div class="details">
            <p><strong>Synopsis:</strong><br><?php echo $movie['synopsis']; ?></p>
            <p><strong>Cast:</strong><br><?php echo $movie['cast']; ?></p>
        </div>

        <div class="book-ticket">
            <button onclick="window.location.href='schedule.php'">Book Ticket</button>
        </div>
    </div>

</body>
</html>
<?php
} else {
    echo "Movie not found.";
}
?>
