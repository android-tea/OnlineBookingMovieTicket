<?php

$movieId = null;

if(isset($_POST["movieId"])){

    $movieId = $_POST["movieId"];

    // echo "<script>alert('$movieId');</script>";

    $pdo = require __DIR__ . ("/db.php");

    require __DIR__ . ("/functions.php");

    $result = getRow("movie_table","movieId",$movieId);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Website</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">


</head>
<body>
    <body>

        <div>
            <div class="navbar">
        
                <!--N a v i g a t i o n-->
                
                <!--logo-->
                <div class="nav-left"> 
                 <img src="../pics/logo.png" alt="logo" class="logo">
                </div>
        
                <!--navigation texts / links -->
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


    <!--CONTENT-->
         <div>
            <div class="title">
            
                <h5><?= $result["title"] ?></h5>

            </div>


            <div class="container">
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x checked" ></span>
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x"></span>
            </div>


            <div class="genre">
                <p><?= $result["genre"] ?></p>
            </div>
         


            <div class="poster">
                <img src="<?= $result["dir2"] ?>" alt="Poster" class="poster">
            </diV>


            <div class="BookTicket"> 

                <form action="timings.php" method="POST">
                    <input type="hidden" name="movieId" value="<?= $movieId ?>">
                   <button type="submit" class="btn btn-primary">Book Ticket</button>
                </form>

            </div>

           
            <div class="video-container">
                <iframe 
                    width="400"
                    height="300"
                    src="<?= $result["vidUrl"] ?>"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>


         <div class="containerdetails"> 
            <div class="details">
                <h6>
                    <!-- "Spider-Man" follows the story of Peter Parker, a shy and intelligent
                     high school student who gains superhuman abilities after being bitten
                      by a genetically engineered spider during a school field trip. As he navigates
                       his new powers, he adopts the masked persona of Spider-Man to fight crime in
                        New York City. The film explores Peter's struggles with his dual identity, his 
                        responsibilities as a hero, and his relationships with his Aunt May, his best friend
                         Harry Osborn, and his love interest, Mary Jane Watson. The main antagonist is Norman
                          Osborn, who transforms into the Green Goblin after a failed experiment.The film delves into themes 
                          of responsibility, sacrifice, and the challenges of growing up. 
                          It emphasizes the famous adage, "With great power comes great responsibility,"
                           highlighting the moral dilemmas faced by Peter as he learns to balance his personal 
                           life with his duties as a superhero. -->
                           <?= $result["description"] ?>
                 </h6>

                <h6><br><br>Cast:<br><br>
                    
                    <?php $castList = explode(",",$result["castList"]) ?>

                    <?php foreach($castList as $cast): ?>
                               <?= $cast ?> <br> 
                        <?php endforeach; ?>
    
                    <!-- Tobey Maguire as Peter Parker <br>
                    Willem Dafoe as Norman Osborn <br>
                    Kirsten Dunst as Mary Jane Watson <br>
                    James Franco as Harry Osborn <br>
                    Cliff Robertson as Uncle Ben <br> 
                    Rosemary Harris as Aunt May <br> -->
                </h6>
            
            </div>
     
     
</body>
</html>


    




