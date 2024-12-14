<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "cinema_db"; // Use your database name


$ticketNumber = mt_rand(100000, 999999); 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$movieTitle = $_POST['movieTitle'];
$showDate = $_POST['showDate'];
$showTime = $_POST['showTime'];
$seat = $_POST['seat'];
$totalPrice = $_POST['totalPrice'];

// Prepare the SQL query to insert the data
$sql = "INSERT INTO tickets (movie_title, show_date, show_time, seat, total_price)
        VALUES ('$movieTitle', '$showDate', '$showTime', '$seat', '$totalPrice')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Ticket booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
