<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee_registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="style1.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="javascript/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <style>
        body
        {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container
        {
            width:600px;
            padding: 35px;
            border-radius: 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h2
        {
            text-align: center;
            margin-bottom: 30;
        }

        label
        {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

       input[type="text"], input[type="email"]
       {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        label.checkbox
        {
            display: inline-block;
            margin-left:20px;
        }

        input[type="radio"]
        {
            margin-left: 7px;
        }

        button
        {
            color: white;
            padding: 13px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            background-color: #4CAF50;
        }
       
        .error-msg 
        {
            color: red;
            font-size: 10px;
            margin-top: -5px;
            margin-bottom: 5px;
            display: none;
        }

        
    </style>
</head>
<body>


<nav class="navbar bg-body-tertiary fixed-top bg-body-tertiary" >
  <div class="container-fluid">
    <a class="navbar-brand">Employee Registration</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>



<?php
include 'connection.php';
if (isset($_REQUEST['emp_id']) && is_numeric($_REQUEST['emp_id']))
{

  //Fetch teh data from the main Table
  
  $stat="SELECT * FROM `employee`where emp_id=?";
  $stmt=mysqli_prepare($connection,$stat);
  
  mysqli_stmt_bind_param($stmt,'i',$_REQUEST['emp_id']);
  mysqli_stmt_execute($stmt);
  
  $result = mysqli_stmt_get_result($stmt);
  
  $row = mysqli_fetch_array($result);
  
  $mode = 'edit';
  
  //Fetch the data from child table
  
  $stat1="SELECT * FROM `department_master` where department_id=?";
  
  $stmt1=mysqli_prepare($connection,$stat1);
  
  mysqli_stmt_bind_param($stmt1,'i',$_REQUEST['emp_id']);
  mysqli_stmt_execute($stmt1);
  
  $result_child = mysqli_stmt_get_result($stmt1); 
}

else
{
    $mode = 'add';
}

?>

<form action="form_insert.php" id="Employee Registration" method="post">

<input type="hidden" name="mode" value="<?php echo $mode; ?>">

<?php

if ($mode=='edit')
{
  echo "<input type='hidden' name='emp_id' value='".$row['emp_id']."'>";
}

?>
    
<section class ="section bg-body-secondary">
  <div class="container ">
    <div class="row">
      <h2 class=" text-center text-primary ">Employee Registration</h2>
      <h6 class=" text-center text-secondary ">Fill your details in order to register yourself:</h6>
        <br><br>
        
        <form action='form_insert.php' id="registrationForm" onsubmit="return validateForm()" method="post">

        <label for="emp_ame">Employee Name:</label>
        <input type="text" id="emp_name" name="emp_name" value="<?php if($mode =='edit') echo $row['emp_name']?>"required>

        <label for="email">Employee Email:</label>
        <input type="email" id="email" name="email" value="<?php if($mode =='edit') echo $row['email']?>" required>

        <div class="ab-2">
        <div class="col-4"><label class="form.label">Date of Birth</label></div>
        <div class="col"><input class= "form.control"type="date" name="emp_dob" value ="<?php if($mode =='edit') echo $row['emp_dob']?>">
      </div>
      </div>
      <br>

      <label>Gender:</label>
      <label class="radio"><input type="radio" name="gender" value="male" <?php if($mode =='edit') if($row['gender'] == 'male') echo 'checked'; ?>> Male</label>
      <label class="radio"><input type="radio" name="gender" value="female" <?php  if($mode =='edit') if($row['gender'] == 'female') echo 'checked'; ?>> Female</label>
      <label class="radio"><input type="radio" name="gender" value="other" <?php if($mode =='edit') if($row['gender'] == 'other') echo 'checked'; ?>> Other</label>
      <br>

      
      <label for="address">Address:</label>
      <input type="text" id="address" name="address"  value="<?php if($mode =='edit') echo $row['address']?>"  required>

      <label for="phone">Phone Number:</label>
      <input type="text" id="phone" name="phone" value="<?php if($mode =='edit') echo $row['phone']?>" required>

      
      
      

<form action="connection.php">
  <label for="office">Office:</label>
  <select name=" " id="office">
    <option value="office">Select</option>
    <?php 
    $sqlOf=mysqli_query($connection,"SELECT * FROM office");
    while($qryOf=mysqli_fetch_array($sqlOf))
    {
    ?>
    <option value="<?php  echo $qryOf['office_id']?>" <?php if($row['office'] == $qryOf['office_id'])
    { 
      echo 'selected';
      }
      ?>>
      <?php 
       echo $qryOf['office_name']
       ?>
       </option>
  <?php 
} ?>
  </select>
  
  <br><br>

 
  

      <label>Department:</label>
      <div>
      
      <?php
             
      include 'connection.php';

      $sql_stmt='SELECT * FROM department_master';
      $result=mysqli_query($connection,$sql_stmt);

      while($row=mysqli_fetch_array($result))
      {
        ?>
        
        <input type="checkbox" name="preferences[]" value="<?php echo $row['department_id']; ?>" 
        <?php
  if ($mode=='edit')
  {
  $sqlCh=mysqli_query($connection,"SELECT * FROM emp_depart WHERE emp_id ='$_REQUEST[emp_id]'");
  
  while($qrych=mysqli_fetch_array($sqlCh))
  {
    if($qrych['department_id'] == $row['department_id'])
    {
      echo 'checked';
    }
  }
}
  ?>

        />
        <label > <?php echo $row['department_name']; ?> </label><br>
        
        <?php
      }
      
      ?>

<?php


?>



    </div>
    <br><br>
    
    <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit </button></div>
    <br><br>
    
    
    
  </form>

 
    
  

</div>
    

</section>
            
</body>

</html>