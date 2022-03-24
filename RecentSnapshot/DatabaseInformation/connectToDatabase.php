<?php
include_once 'imports.php';
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "equipmentDataBase";

if (!$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName)){

die ("Failed to connect to database");


}



?>