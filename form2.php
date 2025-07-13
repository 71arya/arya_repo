<?php
include 'connection.php';

echo '<pre>';
print_r($_REQUEST);

print_r($_FILES["patient_img"]);

echo $patient_img=$_FILES["patient_img"]["name"];
$temp=$_FILES["patient_img"]["tmp_name"];
$folder="images/".$patient_img;

move_uploaded_file($temp,$folder);

$patient_name=mysqli_real_escape_string($connection,$_REQUEST['patient_name']);
$mobile_number=$_REQUEST['mobile_number'];
$gender=$_REQUEST['gender'];
$dob=$_REQUEST['dob'];
$category=$_REQUEST['category'];
$e_mail=$_REQUEST['e_mail'];
$present_address=$_REQUEST['present_address'];
$permanent_address=$_REQUEST['permanent_address'];
$facility_id=$_REQUEST['facility_id'];

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
    header('location:edit.php');
}


?>