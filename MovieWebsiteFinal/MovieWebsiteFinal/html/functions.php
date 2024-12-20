<?php

$pdo = require __DIR__ . ("/db.php");


// Fetches all rows from a table
function fetchAll($tablename){

global $pdo;

$sql = "SELECT * FROM $tablename";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $result;
}

// Fetches table count

function countRows($tablename){

global $pdo;
    
$sql = "SELECT COUNT(*) AS row_count FROM $tablename";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$count = $stmt->fetch(PDO::FETCH_ASSOC);

return $count;
}

// Fetches a single row from a table
function getRow($tablename,$column,$value){

global $pdo;
    
$sql = "SELECT * FROM $tablename WHERE $column = :value";
    
$stmt = $pdo->prepare($sql);
    
$stmt->execute(["value" => $value]);
    
$result = $stmt->fetch(PDO::FETCH_ASSOC);
    
return $result;
}
    


















?>