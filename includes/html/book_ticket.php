<?php
// Database connection
$host = 'localhost'; // Your database host
$dbname = 'cinema_booking'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password (if any)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Process the form when submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seats = $_POST['seats']; // Selected seats
    $total_price = $_POST['total_price']; // Total price
    $movie_id = 1; // Example: assuming movie ID is passed in the form or selected

    // Optionally, you could retrieve the movie ID from the database or form
    // $movie_id = $_POST['movie_id']; // Assuming movie ID is selected from a dropdown

    // Insert booking details into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO bookings (movie_id, seats, total_price) VALUES (:movie_id, :seats, :total_price)");
        $stmt->bindParam(':movie_id', $movie_id);
        $stmt->bindParam(':seats', $seats);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->execute();

        echo "Booking successful!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
