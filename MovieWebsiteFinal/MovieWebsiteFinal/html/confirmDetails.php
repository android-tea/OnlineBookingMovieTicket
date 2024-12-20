<?php


session_start();

$userId = $_SESSION["user_id"];

$movieId = null; // Movie ID (might be assigned from a database or user selection)
$location = null; // Location of the cinema or showtime
$year = null; // Year of the showtime
$month = null; // Month of the showtime
$day = null; // Day of the showtime
$showTime = null; // Show time (time the movie is playing)
$seatList = null; // List of selected seats
$totalPrice = null; // Total price for the selected seats

if(isset($_POST["submit"])){

    $movieId = $_POST["movieId"];
    $location = $_POST["location"]; // Location from form submission
    $year = $_POST["year"]; // Year from form submission
    $month = $_POST["month"]; // Month from form submission
    $day = $_POST["day"]; // Day from form submission
    $showTime = $_POST["showTime"]; // Show time from form submission
    $seatList = $_POST["seatList"]; // List of selected seats from form submission
    $totalPrice = $_POST["totalPrice"]; // Total price from form submission

    $date = $year . "-" . $month . "-" . $day;

    $pdo = require __DIR__ . ("/db.php");

    require __DIR__ . ("/functions.php");

    $movie = getRow("movie_table","movieId",$movieId);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Ticket Details</title>
    <link rel="stylesheet" href="../css/confirm.css">
</head>
<body>
    <div class="confirmation">
        <h3>Confirm Your Ticket Details</h3>
        <p><strong>Movie:</strong> <span><?= $movie["title"] ?></span></p>
        <p><strong>Location:</strong> <span><?= $location ?></span></p>
        <p><strong>Date:</strong> <span><?= $date ?></span></p>
        <p><strong>Show Time:</strong> <span><?= $showTime ?></span></p>
        <p><strong>Seat List:</strong> <span><?= $seatList ?></span></p>
        <p><strong>Total Price:</strong> <span><?= $totalPrice ?></span></p>

        <div class="buttons">
            <button onclick="goBack()">Edit Details</button>

            <form action="processReservation.php" method="POST">
                <input type="hidden" name="userId" value="<?= $userId ?>">
                <input type="hidden" name="movieId" value="<?= $movieId ?>">
                <input type="hidden" name="movieTitle" value="<?= $movie["title"] ?>">
                <input type="hidden" name="location" value="<?= $location ?>">
                <input type="hidden" name="date" value="<?= $date ?>">
                <input type="hidden" name="showTime" value="<?= $showTime ?>">
                <input type="hidden" name="seatList" value="<?= $seatList ?>">
                <input type="hidden" name="totalPrice" value="<?= $totalPrice ?>">
                <button type="submit" name="submit">Confirm Booking</button>
            </form>
        </div>
    </div>

    <script>
        // Retrieve and display URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        document.getElementById('location').textContent = urlParams.get('location');
        document.getElementById('day').textContent = urlParams.get('day');
        document.getElementById('month').textContent = urlParams.get('month');
        document.getElementById('date').textContent = urlParams.get('date');
        document.getElementById('showTime').textContent = urlParams.get('showTime');
        const price = urlParams.get('price');
        document.getElementById('price').textContent = price;

        function goBack() {
            // Redirect back to the input page
            window.history.back();
        }

        function confirmDetails() {
            // Generate random ticket number
            const ticketNumber = Math.floor(Math.random() * 900000) + 100000;

            // Redirect to final ticket receipt page
            const queryString = `?location=${urlParams.get('location')}&day=${urlParams.get('day')}&month=${urlParams.get('month')}&date=${urlParams.get('date')}&showTime=${urlParams.get('showTime')}&ticketNumber=${ticketNumber}&price=${encodeURIComponent(price)}`;
            window.location.href = `ticket_receipt.html${queryString}`;
        }
    </script>
</body>
</html>
