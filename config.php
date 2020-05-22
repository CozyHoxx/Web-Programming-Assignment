<?php
$databaseHost = 'localhost';
$databaseName = 'treasurehuntwebsite';
$databaseUsername = 'root';
$databasePassword = '';

// Connect to DB
$db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

//Check connection
if($db === false){
    die("Error: connection error.".mysqli_connect_error());
}



?>