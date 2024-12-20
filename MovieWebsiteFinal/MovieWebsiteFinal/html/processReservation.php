<?php

    


if(isset($_POST["submit"])){

    $userId = $_POST["userId"];
    $movieId = $_POST["movieId"];
    $movieTitle = $_POST["movieTitle"];
    $location = $_POST["location"]; // Location from form submission
    $date = $_POST["date"];
    $showTime = $_POST["showTime"]; // Show time from form submission
    $seatList = $_POST["seatList"]; // List of selected seats from form submission
    $totalPrice = $_POST["totalPrice"]; // Total price from form submission

   

    $pdo = require __DIR__ . ("/db.php");

    require __DIR__ . ("/functions.php");

    $params = [
        'userId'    => $userId,   // User ID
        'movieId'    => $movieId,
        'location'  => $location, // Location
        'date'      => $date,     // Date (combined year, month, and day)
        'showTime'  => $showTime, // Show Time
        'seatList'  => $seatList, // Seat List
        'totalPrice'=> $totalPrice // Total Price
    ];
    
    // Prepare the SQL INSERT statement (uploads to database)
    $sql = "INSERT INTO reservation_table (userId, movieId, location, date, showTime, seatList, totalPrice)
            VALUES (:userId, :movieId, :location, :date, :showTime, :seatList, :totalPrice)";
    
    // Prepare the statement
    $stmt = $pdo->prepare($sql);
    
    
    // Execute the statement (gets row id of the reservation)
    $stmt->execute($params);
    
    $sql = "SELECT * FROM reservation_table
        WHERE userId = :userId
        AND movieId = :movieId
        AND location = :location
        AND date = :date
        AND showTime = :showTime
        AND seatList = :seatList
        AND totalPrice = :totalPrice";

$stmt = $pdo->prepare($sql);

$params = [
    ':userId' => $userId,
    ':movieId' => $movieId,
    ':location' => $location,
    ':date' => $date,
    ':showTime' => $showTime,
    ':seatList' => $seatList,
    ':totalPrice' => $totalPrice,
];

$stmt->execute($params);
        
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
    $reservationId = $result["reservationId"];

    header("Location: ticket_receipt.php?" . http_build_query([
        'reservationId' => $reservationId,
        'movieTitle' => $movieTitle,
        'location' => $location,
        'date' => $date,
        'showTime' => $showTime,
        'seatList' => $seatList,
        'totalPrice' => $totalPrice,
    ]));
}

?>