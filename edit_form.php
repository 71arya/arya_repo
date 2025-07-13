<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>edit</title>
  </head>
  <body>
    

   
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>





    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>full_name</th>
                <th>email</th>
            
                <th>address</th>
                
                <th>phone_number</th>
                <th>gender</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
include 'connect.php';

$query_str= "SELECT * FROM resistration";

$result=mysqli_query($connection,$query_str);
while($result_array_row = mysqli_fetch_array($result))
{

    ?>
        <tr>
                <td><?php echo $result_array_row['id']; ?></td>
                <td><?php echo $result_array_row['full_name'] ;?></td>
                <td><?php echo $result_array_row['email']; ?></td>
                <td><?php echo $result_array_row['address'] ;?></td>
                
                <td><?php echo $result_array_row['phone_number'] ;?></td>
                <td><?php echo $result_array_row['gender'] ;?></td>
              
                <td><a href="form3.php?id=<?php echo $result_array_row['id']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $result_array_row['id'] ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
 
  </body>
  <script>

new DataTable('#example');

  </script>
</html>