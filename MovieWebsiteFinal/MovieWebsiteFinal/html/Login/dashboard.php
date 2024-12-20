<?php

require __DIR__ . ("/db.php");

require __DIR__ . ("/functions.php");

$result = fetchAll("reservation_table");


$reservationCountResult = countRows("reservation_table");

$reservationCount = $reservationCountResult["row_count"];


$userCountResult = countRows("user_table");

$userCount = $userCountResult["row_count"];


$movieCountResult = countRows("movie_table");

$movieCount = $movieCountResult["row_count"];


$sql = "SELECT COUNT(DISTINCT genre) AS total_genres FROM movie_table";
$stmt = $pdo->prepare($sql);

$stmt->execute();

$genreCountResult = $stmt->fetch(PDO::FETCH_ASSOC);

$genreCount = $genreCountResult["total_genres"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

      <!-- Montserrat Font -->
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

      <!-- Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

      <link rel="stylesheet" href="Styles/dashboardStyle.css">
</head>
<body>
    <div class="grid__container">


    <!-- Nav Section -->

    <nav class="navbar">
        <div class="navbar__container">
        <!-- <div id="navbar__logo"></div> -->
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="../homepage.php" class="navbar__links">Home</a>
            </li>
      
        </ul>


        <div class="navbar__icons">
          <div class="notification" onclick="toggleNotification()">
            <img src="Images/notif.png" alt="pic" id="navbar__notification" >
            <ul class="notif__list" id="notificationDropdown">
              <li class="notif__item">You got mail</li>
              <li class="notif__item">You got mail</li>
              <li class="notif__item">You got mail</li>
            </ul>
          </div>

            <img src="Images/profile.png" alt="pic" id="navbar__profile">
        </div>
      </div>
    </nav>

<main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3>MOVIES</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1><?= $movieCount ?></h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>GENRES</h3>
              <span class="material-icons-outlined">category</span>
            </div>
            <h1><?= $genreCount ?></h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>USERS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1><?= $userCount ?></h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>RESERVATIONS</h3>
              <span class="material-icons-outlined">notification_important</span>
            </div>
            <h1><?= $reservationCount ?></h1>
          </div>

        </div>

        <div class="charts">

            <div class="charts-card">
              <h2 class="chart-title">Top 5 Movies</h2>
              <div id="bar-chart"></div>
            </div>
  
            <div class="charts-card">
              <h2 class="chart-title">Reservations and Users</h2>
              <div id="area-chart"></div>
            </div>
  
          </div>

      </main>

  </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.54.1/apexcharts.min.js"></script>
<script src="Scripts/scripts.js"></script>
</body>
</html>