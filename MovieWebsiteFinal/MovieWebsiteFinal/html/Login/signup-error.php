<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Error</title>
    <link rel="stylesheet" href="Styles/signUp.css">
</head>

<body>
    <div class="background-container">
        <div class="overlay"></div>
        <div class="content">
            <div class="card">
                <h1>Invalid email</h1>
                <p> <?= htmlspecialchars( $_SESSION['invalid_email']) ?> has already been taken, <a href="signup.html">try again.</a> </p>
            </div>
        </div>
    </div>



</body>
</html>
