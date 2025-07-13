<?php
if(isset($_POST['add_to_cart'])){
    if($user_id==''){
        header('location:login.php');
    }else{
    $pid=$_POST['pid'];
    $pid=filter_var($pid,FILTER_SANITIZE_STRING);
    $pid=$_POST['name'];
    $pid=filter_var($pid,FILTER_SANITIZE_STRING);
$pid=$_POST['price'];
    $pid=filter_var($price,FILTER_SANITIZE_STRING);
    $pid=$_POST['image'];
    $pid=filter_var($image,FILTER_SANITIZE_STRING);
    $pid=$_POST['qty'];
    $pid=filter_var($qty,FILTER_SANITIZE_STRING);
    $check_cart_numbers=$conn->prepare("SELECT * FROM 'cart' WHERE user_id=? AND name=?");
    $check_cart_numbers->execute([$user_id,$name]);
    if( $check_cart_numbers->rowcount()>0)
    {
$message[]='already added to cart';
    }else
    {

$insert_cart=$count->prepare("INSERT INTO'cart'(user_id,pid,name,price,quantity,image)VALUES(?,?,?,?,?,?)");
$message[]='added to cart!';
    
}
}
}

?>