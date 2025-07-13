<?php
include 'connect.php';

echo '<pre>';

print_r($_REQUEST);

$id=$_REQUEST['id'];

$delete= "DELETE FROM resistration WHERE id = $id";
 
$result= mysqli_query ($connection,$delete);

if($result)
{
    echo " Deleted Successfully ";
    header('Location:edit_form.php');
}
else
{
    echo " Error in deleting record: ";

}

?>