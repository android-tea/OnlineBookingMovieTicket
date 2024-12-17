<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $movieTitle = $_POST['movieTitle'];
    $showDate = $_POST['showDate'];
    $showTime = $_POST['showTime'];
    $seat = $_POST['seat'];
    $totalPrice = $_POST['totalPrice'];
}
?>
