<?php
require_once('includes/config.php');
include("includes/auth.php");
$title = 'Dashboard';
require('layout/header.php');
?>

<div class="form">
<p>Welcome to Dashboard.</p>
<p><a href="index.php">Home</a><p>
<p><a href="reservation.php">Make Booking</a></p>
<p><a href="view.php">View Records</a><p>
<p><a href="logout.php">Logout</a></p>
</div>

<?php
//include header template
require('layout/footer.php');
?>
