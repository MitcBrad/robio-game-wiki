<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=1, minimum-scale=1.0, maximum-scale=1.0">
    <title></title>
</head>
<body>

<?php

$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "robio";


$conn = new mysqli($host, $login, $password, $database);


if ($conn->connect_errno){
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die ("Connection to the database failed: ($errno) $errmsg");
}


$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'robio');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}






?>

</body>
</html>