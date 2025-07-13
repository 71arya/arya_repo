<?php
include 'connect.php';

echo '<pre>';
print_r($_REQUEST);


$full_name=mysqli_real_escape_string($connection,$_REQUEST['full_name']);
$email=$_REQUEST['e_mail'];
$address=$_REQUEST['address'];
$phone_number=$_REQUEST['phone_number'];
$address=$_REQUEST['address'];


$mode=$_REQUEST['mode'];

if($mode=='Add'){
echo $ins_stmt="INSERT into patient values
('','$patient_img','$patient_name','$mobile_number','$gender','$dob','$category','$e_mail','$present_address','$permanent_address')"; 
$result=mysqli_query($connection,$ins_stmt);
$patient_id=mysqli_insert_id($connection);

foreach($facility_ids AS $facility_id) {
    echo $sql_child = "INSERT INTO patient_facility VALUES(NULL, $patient_id, $facility_id)"; 
    $result = mysqli_query($connection,$sql_child);

}

}
else{
    $patient_id=$_REQUEST['patient_id'];
	$ins_stmt="UPDATE patient set patient_name = '$patient_name',patient_img='$patient_img',mobile_number= '$mobile_number',gender='$gender',dob='$dob',category='$category',e_mail='$e_mail',present_address='$present_address',permanent_address='$permanent_address', facility_id='$facility_ids';
     where patient_id=$patient_id";
    $result=mysqli_query($connection,$ins_stmt);

    // Delete all rows from patient_facility where patient_id = $patient_id
    $del="DELETE from patient_facility where patient_id=$patient_id";
    $result=mysqli_query($connection,$del);

    // Reinsert into patient_facility (same code as line 33-37)
    $facility_id=$_REQUEST['$facility_id'];
    foreach($facility_ids AS $facility_id) {
        echo $sql_child = "INSERT INTO patient_facility VALUES(NULL, $patient_id, $facility_id)"; 
        $result = mysqli_query($connection,$sql_child);
    
    }
}

if($result){
    header('location:edit_form.php');
}


?>