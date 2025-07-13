<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	
	</head>
	
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">LOGIN WEBSITE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </nav>
    
	<div class="container border my-3">
		<div class="row">
		<h1 class="display-4; text-center">E-commerce</h1>
			<div class="col-4"></div>
			<div class="col-6">
			
	     <?php
		 include 'projectconnection.php';
		 $mode='ADD';
		 if(isset($_REQUEST['customer_id']))
		 {
			 if($_REQUEST['customer_id']>0)
			 {
				 $mode='Edit';
				 
				 $customer_id=$_REQUEST['customer_id'];
				 $query="SELECT * from customer where customer_id =$customer_id";
				 $result_customer=mysqli_query($projectconnection,$query);
				 $row_customer=mysqli_fetch_array($result_customer);

				
				 $query="SELECT * from customer_category where customer_id =$customer_id";
				 $result_customer_category=mysqli_query($projectconnection,$query);
				 	
				$cat_array = array();
				while($row_customer_category=mysqli_fetch_array($result_customer_category)){
					$cat_array[] = $row_customer_category['catagory_id'];
				}
				 }
		 }
		 ?>
				 <br></br>
				 <form action="project_insert.php" method="post">
				 <?php
				 if($mode=='ADD'){
					 echo "<input type=hidden name=mode value=ADD>";
				 ?>
				 <div class="form-group">
					<div class="row">
						<div class="col-3"><label for="customer_id"><h5>Customer ID</h5></label></div>
						<div class="col-9"><input type="number" name= "customer_id" class="form-control" id="customer_id" aria-describedby="customeridhelp" placeholder="Enter Customer ID"></div>
					</div>
				</div>
  

				 <?php
				 }else{
					 echo "<input type=hidden name=mode value=Edit>";
				 ?>
				 <input type=hidden name="customer_id" value="<?php echo $row_customer['customer_id']; ?>">
				 <?php
				 }
				 ?>
				 
				 <div class="form-group mt-3">
				 <div class="row">
					<div class="col-3"><label for="Firstname"><h5>Firstname</h5></label></div>
					<div class="col-9"><input type="text" name="Firstname" class="form-control" id="customer_id" aria-describedby="customeridhelp" placeholder="Enter firstname" value="<?php if ($mode=='Edit') echo $row_customer['Firstname']; ?>"></div>
				 </div>
					<small id="customernamehelp" class="form-text text-muted"></small>
				 </div>
				 <div class="form-group mt-3">
				 <div class="row">
					<div class="col-3"><label for="Lastname"><h5>Lastname</h5></label></div>
					<div class="col-9"><input type="text" name="Lastname" class="form-control" id="customer_id" aria-describedby="customeridhelp" placeholder="Enter Lastname" value="<?php if ($mode=='Edit') echo $row_customer['Lastname']; ?>"></div>
				 </div>
					<small id="customernamehelp" class="form-text text-muted"></small>
				 </div>  
				<br>
				
				<pre><label for ="Payment"><h4>Payment</h4></label> 	
				<label for="radio_cash_Payment"><input type="radio" id="radio_cash_Payment" name="Payment" value="Cash" <?php if ($mode=='Edit') if($row_customer['payment'] == 'Cash') { echo 'checked';}?>>Cash</label> 
				<label for="radio_UPI_Payment"><input type="radio" id="radio_UPI_payment" name="Payment" value="UPI" <?php if ($mode=='Edit') if($row_customer['payment'] == 'UPI') { echo 'checked';}?>>UPI</label> 
				<label for="radio_Creditcard_Payment"><input type="radio" id="radio_Creditcard_Payment" name="Payment" value="Creditcard" <?php if ($mode=='Edit') if($row_customer['payment'] == 'Creditcard') { echo 'checked';}?>>Creditcard</label>
				<label for="radio_EMI_Payment"><input type="radio" id="radio_EMI_Payment" name="Payment" value="EMI" <?php if ($mode=='Edit') if($row_customer['payment'] == 'EMI') { echo 'checked';}?>>EMI</label>
				 </pre>
				 <h5>Catagory</h5>	  
				 
				 <?php
				// include 'projectconnection.php';
				 $sql_stmt ="SELECT *FROM Catagory";
				 $result = mysqli_query($projectconnection,$sql_stmt);
				 while($row_cat=mysqli_fetch_array($result)){
				?>
				
				<input type="checkbox" id="checkbox_cash_Payment" name="Catagory[]" value="<?php echo $row_cat['catagory_id'] ?>"
					<?php
						if ($mode == 'Edit') {
						 if (count($cat_array) > 0 ) {
							if (in_array($row_cat['catagory_id'],$cat_array)) {
								echo ' checked ';
							}
						}
						}
					?>	
				><?php echo $row_cat['catagory_name'] ?></label>  
				
				 <?php
				 }
				 ?>
				
				 
				<div class="form-group mt-3">
				 <div class="row">
					<div class="col-3"><label for="Email"><h5>Email</h5></label></div>
					<div class="col-9"><input type="email" name="Email"  class="form-control" id="email" aria-describedby="customeridhelp" placeholder="Enter Email" value="<?php  if ($mode=='Edit') echo $row_customer['Email'];  ?>"></div>
				 </div> 
				 <div class="form-group mt-3">
				 <div class="row">
					<div class="col-3"><label for="Phone_no"><h5>Phone_no</h5></label></div>
					<div class="col-9"><input type="varchar" name="Phone_no" class="form-control" id="customer_id" aria-describedby="customeridhelp" placeholder="Enter Phone_no" name="Phone_no" value="<?php if ($mode=='Edit') echo $row_customer['Phoneno']?>"></div>
				 </div> 
				 <!--<input type="Login" name="Login" value="Login">-->
				 <div class="container my-3 bg-light">
				 <div class="col-md-12 text-center">
				 
				 <button type="submit" class="btn btn-primary">login</button>
                 </div>
				 </div>
				 
				 <a herf='show project_insert.php' DATA ENTRY TABLE /a>
				 </form>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<body background ="images/E-com (2).avif"></body>






	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Login</button>
        </div>
      </div>
    </div>
  </div>
 
</body>
</html>