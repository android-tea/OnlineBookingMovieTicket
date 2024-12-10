<?php
// Database connection settings
$servername = "localhost"; // or your Laragon server's settings
$username = "root"; // adjust based on your setup
$password = ""; // adjust based on your setup
$dbname = "cinemust"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the G-Cash details from the form
    $gcash_number = $_POST['gcash-number'];
    $pin = $_POST['pin'];
    $amount = $_POST['amount'];

    // Example: Insert payment details into the payments table
    $sql = "INSERT INTO payments (gcash_number, pin, amount) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $gcash_number, $pin, $amount); // Bind parameters

    // Execute the query and check if it's successful
    if ($stmt->execute()) {
        // If the payment is processed successfully, redirect to the next page
        header("Location: 6.html"); // Redirect to the next page after payment
        exit; // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error; // Display error if the query fails
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
