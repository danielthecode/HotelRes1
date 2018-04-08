<?php
//include auth.php file on all secure pages
require_once('includes/config.php');
include("includes/auth.php");

$userid = $_SESSION['uid'];

$title = 'Reservation';

if(isset($_POST['submit'])){

    $checkin = date('Y-m-d', strtotime($_POST['checkin']));
  	$checkout = date('Y-m-d', strtotime($_POST['checkout']));
  $numberOfGuests = $_POST['numberOfGuests'];
  $roomType = $_REQUEST['roomType'];

    $query = "INSERT INTO `reservation` (`res_id`, `guest_id`, `check_in_date`, `check_out_date`, `number_of_guests`, `room_type`)
     VALUES (NULL, '$userid', '$checkin', '$checkout', '$numberOfGuests', '$roomType');";
    $result = mysqli_query($con,$query);
    if($result){
          echo "<div class='form'>
    <h3>You Have Sucessfully Made a Reservation.</h3>
    <br/>Click here to Make another <a href='reservation.php'>Reservation</a></div>";
}
else if (!$result) {
  echo "<div class='form'>
<h3>Something went wrong.</h3>
<br/>Click here to try again <a href='reservation.php'>Reservation</a></div>";
}
  }else{


require('layout/header.php');
?>

<div class="container">
  <h1>Booking Details</h1>
  <form class="form-horizontal" role="form" action="" method="post">

    <div class="form-group"> <!-- Date input -->
        <label class="control-label col-sm-2" for="checkin">Check-In Date:</label>
        <input class="form-control" id="checkin"  name="checkin" type="date" min="2018-04-04" required/>
    </div>

    <div class="form-group"> <!-- Date input -->
          <label class="control-label col-sm-2" for="checkout">Check-out Date:</label>
          <input class="form-control" id="checkout"  name="checkout"  type="date" min="2018-04-04" required/>
    </div>

    <div class="form-group">
      <label for="numberOfGuests" class="control-label col-sm-2">Number of Guests:</label>
        <div class="col-sm-5">
          <input type="number" name="numberOfGuests" id="numberOfGuests" class="form-control"  placeholder="Number of Guests"  min="1" max="6" required>
      </div>
    </div>

    <div class="form-group">
      <label for="roomType" class="control-label col-sm-2">Room Type:</label>
        <div class="col-sm-5">
          <select class="form-control" name="roomType" required>
            <option value=""></option>
            <option value="Penthouse">Penthouse</option>
            <option value="Deluxe Room"> Deluxe Room</option>
            <option value="Superior Room"> Superior Room</option>
            <option value="Executive Room"> Executive Room</option>
            <option value="Pacific Room"> Pacific Room</option>
            <option value="Pacific Suite"> Pacific Suite</option>
            <option value="Deluxe Suite"> Deluxe Suite</option>
            <option value="Executive Suite"> Executive Suite</option>
            <option value="Presidential Suite"> Presidential Suite</option>
          </select>
      </div>
    </div>

    <input type="hidden" value="1" name="new" />

      <div class="form-group">
        <label class="control-label col-sm-2"></label>
        <div class="col-sm-5">
        <input type="submit" class="btn btn-dark btn-block" name="submit" value="Reserve"/>
        </div>
      </div>

  </form>
   <a href="index.php">Back to Dashboard</a>
</div>
<?php } ?>

<?php
//include header template
require('layout/footer.php');
?>
