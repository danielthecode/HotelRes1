<?php
require_once('includes/config.php');
include("includes/auth.php");
$title = 'Dashboard';
require('layout/header.php');
require('layout/nav_login.php');


$username = $_SESSION['username'];

//echo $email;
$query = "SELECT guest_id FROM guest WHERE username = '$username' ";
$result = mysqli_query($con,$query) ;

while($row=mysqli_fetch_assoc($result)){
  $_SESSION['uid'] = (int)$row['guest_id'];
}
?>

<div class="container">
  <br>
<p>Welcome to Dashboard.</p>
<p><a href="reservation.php">Make Reservation</a></p>
<p><a href="manage.php">View Reservations</a><p>
<p><a href="profile.php">Account Details</a><p>
<p><a href="logout.php">Logout</a></p>
</div>

<?php
//include header template
require('layout/footer.php');
?>
