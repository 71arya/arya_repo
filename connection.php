
<?php
$host='localhost';
$user='root';
$password='';
$dbname='user1';
$port='3307';
$connection=mysqli_connect($host,$user,$password,$dbname,$port);

if($connection){
echo'connected successfully';
}
else{
echo'connection error';
}
?>

