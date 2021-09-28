<header class="navbarheader">
<?php 
if(!isset($_SESSION))
{ 
  session_start();
} 

if(!isset($_SESSION['role'])) 
{ 
  $_SESSION['role'] = "none";
} 

include('connection.php'); 
?>
<style>
    <?php include "assets/css/headerstyle.css" ?>
</style>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  
<div>
</div>
<div class="logo">AthensCoffee</div>
<div class="menu">
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="aboutus.php">About Us</a></li>
    <?php
    if($_SESSION['role'] == "customer"){
      $user_id = $_SESSION['user_id'];
      $sql = "SELECT user_name FROM tabel_user WHERE tabel_user.user_id = '$user_id'";
      $result=$connection->query($sql);
      if($row=mysqli_fetch_assoc($result)){
        $name = $row['user_name'];
      }
      ?>
      <li><a href="cart.php">Cart</a></li>
      <li><a href="orderhistory.php">Order History</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php
    }else if($_SESSION['role'] == "admin"){
      ?>
      <li><a href="sales.php?order_status=0">Sales</a></li>
      <li><a href="maintenance.php">Maintenance</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php
    }else{
      ?>
      <li><a href="signupform.php">Sign In</a></li>
      <?php
    }
    ?>
  </ul>
</div>
  </header>
