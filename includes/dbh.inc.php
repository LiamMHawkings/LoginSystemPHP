<!-- FILE for handling connection to database -->

<?php

//For using XAMPP connection as server.
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn){
  die("Connection Failed: " . mysqli_connect_error());
}
