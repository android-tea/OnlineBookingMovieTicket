<?php

if (empty($_POST["fname"])) {
    die("First name is required");
}

if (empty($_POST["lname"])) {
    die("Last Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if (empty($_POST["password_confirmation"])) {
    die("Confirm Password");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user_table (firstName,lastName,email, password_hash)
        VALUES (?,?,?,?)";

$stmt = $mysqli->stmt_init();



try {
    $stmt->prepare($sql);
  


$stmt->bind_param("ssss",
                  $_POST['fname'],
                  $_POST['lname'],
                  $_POST['email'],
                  $password_hash);

 //   Checks if there is a database error and if its a 1062 (duplicate)

 try {
                    
  $stmt->execute();

  header ("Location: signup-success.html");
  exit;

  } catch (mysqli_sql_exception $e) {

 if ($e->getCode() === 1062) {

        session_start();

        $_SESSION["invalid_email"] = $_POST["email"];

        header ('Location: signup-error.php');
        exit;

 } else {
  die("Database error: " . $e->getMessage());
          }
       }

    } catch (mysqli_sql_exception $e)  {
       die("SQL error: " . $e->getMessage());

    }
