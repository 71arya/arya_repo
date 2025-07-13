<?php
include 'connection.php';
session_start();
$user_id=$_REQUEST['user_id'];
 $user_password=$_REQUEST['user_password']; 

include 'connection.php';

echo $check_query = "SELECT * FROM user1 where user_id='$user_id' and password='$user_password' ";

$result= mysqli_query($connection,$check_query);
$rows_returned= mysqli_num_rows($result);

if($rows_returned == 1) {
    $row=mysqli_fetch_array($result);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['loggedin'] = true;
   
    header("location:carousel.php");
} else {
    
    $_SESSION['loggedin'] = false;
}
?>