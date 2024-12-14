<?php
//  database connection
include('db.php');

// Fetch all movies from the database
$sql = "SELECT id, title, poster FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Homepage</title>
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
                <a href="#Home" class="home-button">Home</a>
                <a href="#Schedule" class="schedule-button">Schedule</a>
                <a href="#Cinemas" class="cinemas-button">Cinemas</a>
                <a href="#Category" class="category-button">Category</a>
            </nav>
        </div>
        <form class="nav-right">
            <input type="search" id="searchBox" placeholder="Search....">
            <input type="image" src="search.png" alt="search" id="searchButton">
        </form>
        <div class="nav-right">
            <a href="#notification"><img src="notif.png" id="notifBox" alt="Notifications"></a>
            <a href="profile"><img src="profile.png" id="profileBox" alt="Profile"></a>
        </div>
    </div>

    <!-- Movie Posters Section -->
    <div class="movie-posters">
        <?php while($movie = $result->fetch_assoc()) { ?>
            <div class="movie-item">
                <a href="movieclicked.php?movie_id=<?php echo $movie['id']; ?>">
                    <img src="images/<?php echo $movie['poster']; ?>" alt="<?php echo $movie['title']; ?>" class="movie-poster">
                    <p><?php echo $movie['title']; ?></p>
                </a>
            </div>
        <?php } ?>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
