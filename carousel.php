4<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    
    body {
      text-align: center; 
    header, main, footer {
      margin: 0 auto;
      max-width: 800px; 
    }
    .content {
      background-image: url('project.jpeg');
      background-size: cover;
      padding: 20px;
      color: white;
      text-align: center;
    }
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.carousel-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.carousel-slide {
    position: relative;


.carousel-slide img {
    max-width: 100%;
    height: auto;
}

.bg-PartsofIT
{
  background-image:url('https://img.freepik.com/free-photo/bread-slices-with-topping-tomato-cheese-olives-white-table_23-2148194999.jpg?w=2000');
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  position: relative;
}
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">

<div class="w3-bar w3-border w3-green w3-large">
<header>
    <a href="#" class="logo"><img src="logo.png"></a>
 

         <a class="navbar-brand" href="#">FOODY</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
</div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link active" aria-current="page" href="carousel.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="edit_form.php">update</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" aria-current="page" href="form3.php">Register</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="veg.php">veg</a></li>
              <li><a class="dropdown-item" href="non-veg.php">non-veg</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="deserts.php">Desserts</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
      
      <?php 
    
       if(isset($_SESSION['user_id'])){ 
        echo 'Welcome '.' '.$_SESSION['user_id'];
        ?>&nbsp;&nbsp;
        <a href="logout.php" class="btn btn-primary">Logout</a>
       <?php }else{
      ?>
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">login</button>
     <?php } ?>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">login here</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="checklogin.php" method="POST">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">User Name</label>
              <input type="text" name="user_id" class="form-control" id="user_id">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Password</label>
              <input type="password" name="user_password" class="form-control" id="password">
            </div>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Login">
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
  </nav>
       </header>
       
  
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="f3.jpg" class="d-block w-100" alt="...">
             </div>
      <div class="carousel-item">
        <img src="https://sb.kaleidousercontent.com/67418/1920x1280/166659692b/ella-olsson-opbjwbccaeo-unsplash.jpg" class="d-block w-100" alt="...">
        <img src="f5.jpg" class="img-fluid img-thumbnail" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://images.iphonephotographyschool.com/23043/food.jpg" class="d-block w-100" alt="...">
        
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="card text-bg-dark" colour="red">
  <span><h2>FOODY LIFE</h2></span>
  <img src="https://images.pexels.com/photos/1907227/pexels-photo-1907227.jpeg?cs=srgb&dl=pexels-cats-coming-1907227.jpg&fm=jpg"class="card-img" alt="...">
  <div class="card-img-overlay">
    <p class="card-text">                                                 .<br>   <br></p>
    <p class="card-text"><h4>Let food be thy medicine and medicine be thy food.</h4><br>     - Hippocrates<br></p>
    <p class="card-text"><small></small></p>
  </div>
</div>
  <header>
  <p class="fw-bolder"><h1>MENUS</h1>.</p>
</header>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="data:image/jpeg;base64,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" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title">veg</h5>
          <p><a href="desserts.php" class="link-primary">menus</a></p>
        </div>
      </div>
    </div>
    <div class="col-md-4" >
      <div class="card">
        <img src="https://realfood.tesco.com/media/images/RFO-1400x919-classic-chocolate-mousse-69ef9c9c-5bfb-4750-80e1-31aafbd80821-0-1400x919.jpg" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title">Desserts</h5>
          <p><a href="veg.php" class="link-primary">menus</a></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="https://media.istockphoto.com/id/609932720/photo/fish-fry-marinated-fried-fish-on-iron-skillet-griddle.jpg?s=612x612&w=0&k=20&c=bp01Ac2W9O3weuatiXYH-14z0zE7kin3MBeXwqQrAbI=" class="card-img-top" alt="Card Image">
        <div class="card-body">
        <li class="nav-item active">
          <h5>nonveg</h5>
          <p><a href="pesceterian.php" class="link-primary">menus</a></p>
       </li>
          <p class="card-text"></p>
        </div>
      </div>
    </div>
  </div>
</div>
<section class ="section bg-PartsofIT">
  <div class ="container">
    <div class ="row">
      <div class="col-md-12 text-center">
        <h2 class ="section.title text-black">
          <span class="text-info">  </span>
</h2>
<p class ="section-subtitle text-black">

</p>
</div>
</div>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="https://post.healthline.com/wp-content/uploads/2020/09/shrimp-salad-732x549-thumbnail-732x549.jpg" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title">pesceterian</h5>
          <p><a href="pesceterian.php" class="link-primary">menus</a></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="https://becomevegetarian.org/wp-content/uploads/2022/07/What-is-a-Pollotarian.jpg">
        <div class="card-body">
          <h5 class="card-title">Polloterian</h5>
          <p><a href="pesceterian.php" class="link-primary">menus</a></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="https://media.istockphoto.com/id/655123574/photo/soft-drinks-splashing.jpg?s=612x612&w=0&k=20&c=iZcaMSEuzxLRy2lpnUw9NhnTcOhYNgxA3poBbjCsSSc=">
        <div class="card-body">
          <h5 class="card-title">Cold-drinks</h5>
          <p><a href="coldrinks.php" class="link-primary">menus</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<section class ="section bg-PartsofIT">
  <div class ="container">
    <div class ="row">
      <div class="col-md-12 text-center">
        <h2 class ="section.title text-black">
          <span class="text-info">  </span>
</h2>
<p class ="section-subtitle text-black">

</p>
</div>
</div>
<header>
  <h1>Welcome to Our Website</h1>
</header>

<main>
  <section>
    <h2>About Us</h2>
    <li class="nav-item active">
            <a class="nav-link active" aria-current="page" href="about us.php">link</a>
          </li>
    <p>We are a dedicated team of professionals...</p>
  </section>
  
  <section>
    <h2>Services</h2>
    <p>We offer a wide range of services...</p>
  </section>
</main>

<footer>
  <p>&copy; 2023 Your Company. All rights reserved.</p>
</footer>
</p>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>