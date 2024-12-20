<?php


$host = 'localhost';
$port = 3306;
$dbname = 'bookingdb';
$username = 'root';
$password = '@k0l@ng@dm1n';


$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno){
     die("Connection error: " . $mysqli->connect_error);

}

return $mysqli;

?>