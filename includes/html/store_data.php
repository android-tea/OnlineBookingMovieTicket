<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default password for Laragon
$dbname = "cinema_schedule";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if all required fields are submitted
if (
    isset($_POST['movie_type']) &&
    isset($_POST['location']) &&
    isset($_POST['Day']) &&
    isset($_POST['Month']) &&
    isset($_POST['Date']) &&
    isset($_POST['show_time'])
) {
    // Get user inputs
    $movie_type = $conn->real_escape_string($_POST['movie_type']);
    $location = $conn->real_escape_string($_POST['location']);
    $day = $conn->real_escape_string($_POST['Day']);
    $month = $conn->real_escape_string($_POST['Month']);
    $date = intval($_POST['Date']);
    $show_time = $conn->real_escape_string($_POST['show_time']);

    // Insert data into the database
    $sql = "INSERT INTO schedule_data (movie_type, location, day, month, date, show_time)
            VALUES ('$movie_type', '$location', '$day', '$month', '$date', '$show_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Data stored successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "All fields are required!";
}

$conn->close();
?>
