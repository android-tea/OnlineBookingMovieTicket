<?php
// Include the database connection
include('db_connect.php');

// Get the movie ID from the URL
$movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : 0;

// Fetch the movie details based on the movie ID
$sql = "SELECT * FROM movies WHERE id = $movie_id";
$result = $conn->query($sql);

// Check if the movie exists
if ($result->num_rows > 0) {
    $movie = $result->fetch_assoc();
} else {
    die("Movie not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $movie['title']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Movie Detail Page -->
    <div class="movie-detail">
        <h1><?php echo $movie['title']; ?></h1>
        <img src="images/<?php echo $movie['poster']; ?>" alt="<?php echo $movie['title']; ?>" class="movie-poster">
        <div class="movie-description">
            <h3>Description:</h3>
            <p><?php echo $movie['description']; ?></p>
        </div>
        <div class="movie-trailer">
            <h3>Watch Trailer:</h3>
            <iframe width="560" height="315" src="<?php echo $movie['trailer_url']; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <button class="btn btn-primary" onclick="location.href='book_ticket.php?movie_id=<?php echo $movie['id']; ?>'">Book Ticket</button>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
