<?php
require_once('includes/config.php');
include("includes/auth.php");
$title = 'View Reservations';
require('layout/header.php');

$userid = $_SESSION['uid'];



?>

<div class="container">
<table class="table">
  <thead>
    <th>Check-In Date</th>
    <th>Check-out Date</th>
    <th>Number of Guests</th>
    <th>Room Type</th>
    <th>Approved</th>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM reservation WHERE guest_id='$userid'";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
      echo '
        <tr>
        <td>'.$rows['check_in_date'].'</td>
        <td>'.$rows['check_out_date'].'</td>
        <td>'.$rows['number_of_guests'].'</td>
        <td>'.$rows['room_type'].'</td>
        <td>'.$rows['approved'].'</td>
        </tr>
      ';
    }
     ?>
  </tbody>
</table>
</div>


<?php
//include header template
require('layout/footer.php');
?>
