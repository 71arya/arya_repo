<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Management Registration</title>
    <style>
        body {
            
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .bg {
  background-image: url("img_girl.jpg");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
        .background-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('pasta-1854245_1280.jpg'); 
  background-size: cover;
  background-position: center;
  opacity: 0.8;
}
        .container {
            width:600px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
              h2 {
            text-align:center;
            margin-bottom: 30;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }
       input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        label.checkbox {
            display: inline-block;
            margin-left:5px;
        }
        input[type="radio"] {
            margin-left: 7px;
        }
        button {
            color: white;
            padding: 10px 2    px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            background-color: #4CAF50;
        }
       
        .error-msg {
            color: red;
            font-size: 10px;
            margin-top: -5px;
            margin-bottom: 5px;
            display: none;
        }
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
    </style>
</head>
<body>
<?php
include 'connect.php';
if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
{

  //Fetch teh data from the main Table
  
  $stat="SELECT * FROM `resistration`where id=?";
  $stmt=mysqli_prepare($connection,$stat);
  
  mysqli_stmt_bind_param($stmt,'i',$_REQUEST['id']);
  mysqli_stmt_execute($stmt);
  
  $result = mysqli_stmt_get_result($stmt);
  
  $row = mysqli_fetch_array($result);
  
  $mode = 'edit';
  
  //Fetch the data from child table
  
  $stat1="SELECT * FROM `food_customer` where customer_id=?";
  
  $stmt1=mysqli_prepare($connection,$stat1);
  
  mysqli_stmt_bind_param($stmt1,'i',$_REQUEST['id']);
  mysqli_stmt_execute($stmt1);
  
  $result_child = mysqli_stmt_get_result($stmt1); 
}

else
{
    $mode = 'add';
}

?>
<form action ="form_insert1.php" id="Food Management Registration" method="post" onsubmit="return validateForm()">
    <input type="hidden" name="mode" value="<?php echo $mode;?>">
    <?php
    if($mode=='edit')
    {
        echo "<input type='hidden' name='id' value=".$_REQUEST['id'].">"; 
    }
    ?>
<div class="background-image">



      
    <div class="container">
        <h2>Food Management Registration</h2>
        <label for="full_name">full_name</label>
            <input type="text" id="full_name" name="full_name" value="<?php if($mode=='edit') echo $row['full_name']?>" required>
            <label for="email">email</label>
            <input type="email" id="email" name="email" value="<?php if($mode=='edit') echo $row['email']?>"required>
            <label for="address">address</label>
            <input type="text" id="address" name="address"  value="<?php if($mode=='edit') echo $row['address']?>"required>
            <label for="phone_number">phone_number</label>
            <input type="text" id="phone_number" name="phone_number"  value="<?php if($mode=='edit') echo $row['phone_number']?>"required>
            <label for="gender">gender</label>
            <label class="radio"><input type="radio" name="gender" value="male" <?php if($mode=='edit') if($row['gender'] == 'male') { echo 'checked';}?>> male</label>
            <label class="radio"><input type="radio" name="gender" value="female" <?php if($mode=='edit') if($row['gender'] == 'female') { echo 'checked';}?>> female</label>
            <label class="radio"><input type="radio" name="gender" value="other" <?php if($mode=='edit') if($row['gender'] == 'other') { echo 'checked';}?>> other</label>
            <label>preferences</label>
            <div>
                <?php
                include 'connect.php';
                $sql_stmt='SELECT * FROM `food_category`';
                $result=mysqli_query($connection,$sql_stmt);
                while($row=mysqli_fetch_array($result))
                {
                    ?>
                 <input type="checkbox" name="preferences[]" value="<?php echo $row['sl_no'];?>"
                 
                 <?php if($mode=='edit'){
                 $sqlCa=mysqli_query($connection,"SELECT * FROM food_customer WHERE customer_id='$_REQUEST[id]'");
                 while($qryCa=mysqli_fetch_array($sqlCa)){
                    if($qryCa['food_type']== $row['sl_no']){
                        echo 'checked';
                    }
                 }
                }
                 ?>
                 >
                   <label><?php echo $row ['food_type'];?></label>
                <?php
                }
                ?>
            <button type="submit" href="edit_form.php">Resister here</button>
        </form>
    </div>
    <script>
        function validateForm() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var passwordError = document.getElementById('passwordError');

            if (password !== confirmPassword) {
                passwordError.style.display = 'block';
                return false;
            } else {
                passwordError.style.display = 'none';
            }

            return true;
        }
    </script>
</html>
</body>
</html>