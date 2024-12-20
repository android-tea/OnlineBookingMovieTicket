<?php

$reservationId = $_GET['reservationId'];
$movieTitle = $_GET['movieTitle'];
$location = $_GET['location'];
$date = $_GET['date'];
$showTime = $_GET['showTime'];
$seatList = $_GET['seatList'];
$totalPrice = $_GET['totalPrice'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Receipt</title>
    <link rel="stylesheet" href="../css/receipt.css">
</head>
<body>
    <div>
        <div class="navbar">
            <div class="nav-left"> 
                <img src="../pics/logo.png" alt="logo" class="logo">
            </div>
            <div class="nav-center">
                <nav>
                    <a href="homepage.php" id="home">Home</a>
                    <a href="schedmenu.html" id="schedule">Schedule</a>
                    <a href="cinemas.html" id="cinemas">Cinemas</a>
                    <a href="eventsandexp.html" id="eventsandexp">Events and Experiences</a>
                </nav>
            </div>
            <div class="nav-right">
                <a href="#notification"><img src="../pics/notif (1).png" id="notifBox" alt="Notifications"></a>
                <a href="profile"><img src="../pics/profile (1).png" id="profileBox" alt="Profile"></a>
            </div>
        </div>
        
    <div class="ticket">
        <h1>Thank You for Booking!</h1>
        <p>Your booking has been confirmed. Please review your ticket details below.</p>

        <div class="ticket-details">
            <p><strong>Location:</strong> <span><?= $location ?></span></p>
            <p><strong>Movie:</strong> <span><?= $movieTitle ?></span></p>
            <p><strong>Date:</strong> <span><?= $date ?></span></p>
            <p><strong>Show Time:</strong> <span><?= $showTime ?></span></p>
            <p><strong>Seat List:</strong> <span><?= $seatList ?></span></p>
            <p><strong>Ticket Number:</strong> <span><?= $reservationId ?></span></p>
            <p><strong>Total Price:</strong> <span><?= $totalPrice ?></span></p>
        </div>

    </div>

   
</body>
</html>