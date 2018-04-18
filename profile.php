<?php
require_once('includes/config.php');
include("includes/auth.php");
$title = 'Login';
require('layout/header.php');
require('layout/nav_login.php');
$suser = $_SESSION['username'];

 ?>

 <div class="container">
<div class="jumbotron">
  <h1> Account Details </h2>
</div>
<?php
  $query = "SELECT first_name, last_name, address, phone, email FROM `guest` WHERE username='$suser'";
  $result = mysqli_query($con,$query) or die(mysql_error());
  while ($rows = mysqli_fetch_assoc($result)) {
    echo '


    <div class="row">
      <strong class="col-sm-1">Firstname:</strong>
      <div class="col-sm-3">'.$rows['first_name'].'</div>
    </div>

    <div class="row">
      <strong class="col-sm-1">Lastname:</strong>
      <div class="col-sm-3">'.$rows['last_name'].'</div>
    </div>

    <div class="row">
        <strong class="col-sm-1">Address:</strong>
        <div class="col-sm-3">'.$rows['address'].'</div>
    </div>

    <div class="row">
        <strong class="col-sm-1">Phone:</strong>
        <div class="col-sm-3">'.$rows['phone'].'</div>
    </div>

    <div class="row">
        <strong class="col-sm-1">Email:</strong>
        <div class="col-sm-3">'.$rows['email'].'</div>
    </div>

    ';
  }
 ?>
<br>
 <a href="index.php">Back to Dashboard</a>


</div>


 <?php
 //include header template
 require('layout/footer.php');
 ?>
