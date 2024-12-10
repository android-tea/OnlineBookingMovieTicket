<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$movieTitle = $_POST['movieTitle'];
$showDate = $_POST['showDate'];
$showTime = $_POST['showTime'];
$seat = $_POST['seat'];
$totalPrice = $_POST['totalPrice'];
$gcashNumber = $_POST['gcashNumber'];
$otp = $_POST['otp'];

// Simulate OTP validation (in real scenarios, this involves an API call)
if ($otp !== "123456") { // Hardcoded OTP for demo
    echo "Invalid OTP. Please try again.";
    exit;
}

// Save payment data
$sql = "INSERT INTO gcash_payments (movie_title, show_date, show_time, seat, total_price, gcash_number)
        VALUES ('$movieTitle', '$showDate', '$showTime', '$seat', '$totalPrice', '$gcashNumber')";

if ($conn->query($sql) === TRUE) {
    echo "Payment successful! Your ticket has been booked.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
