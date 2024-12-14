<?php
// Save schedule to the database
$servername = "localhost"; // your database server
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "cinema_schedule"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$location = $_POST['location'];
$day = $_POST['day'];
$month = $_POST['month'];
$date = $_POST['date'];
$show_time = $_POST['show_time']; // You need to adjust the time capturing

// SQL to insert data into the database
$sql = "INSERT INTO schedules (location, day, month, date, show_time)
VALUES ('$location', '$day', '$month', '$date', '$show_time')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: Payment.html"); // Redirect to payment page after submission
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
