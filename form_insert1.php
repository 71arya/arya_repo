<?php
include 'connect.php';
echo '<pre>';
print_r($_REQUEST);


$fullname=$_REQUEST['full_name'];
$email=$_REQUEST['email'];

$address=$_REQUEST['address'];
$phone_number=$_REQUEST['phone_number'];
$gender=$_REQUEST['gender'];
$category_ids=$_REQUEST['preferences'];



$mode=$_REQUEST['mode'];

if($mode=='add')
{

//move_uploaded_file($temp,$folder);

	 echo $sql_stmt="INSERT INTO resistration values('','$fullname','$email','','$address','$phone_number','$gender')"; 

	$result = mysqli_query($connection,$sql_stmt);

	$customer_id = mysqli_insert_id($connection);

	foreach($category_ids AS $category_id) {
		$sql_child = "INSERT INTO food_customer VALUES($category_id,$customer_id)";
		$result = mysqli_query($connection,$sql_child);

	}
	

}
else
{
    $customer_id = $_REQUEST['id'];
    $sql_stmt = "UPDATE resistration SET full_name = '$fullname', email = '$email', address = '$address', phone_number = '$phone_number', gender = '$gender' WHERE id = '$customer_id'";
    $result = mysqli_query($connection, $sql_stmt);

    if (!$result) {
        echo "Error: " . mysqli_error($connection);
    }

    $sql_Del = "DELETE FROM food_customer WHERE customer_id = '$customer_id'";
    mysqli_query($connection, $sql_Del);

    foreach($category_ids AS $category_id) {
        $sql_child = "INSERT INTO food_customer VALUES($category_id, $customer_id)";
        mysqli_query($connection, $sql_child);
    }
}

if($result)
{
	header('location:edit_form.php');
}
?>