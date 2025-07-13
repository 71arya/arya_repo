<?php
$host='localhost';
$user='root';
$password='';
$dbname='food_db';
$port='3307';
$connection=mysqli_connect($host,$user,$password,$dbname,$port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

