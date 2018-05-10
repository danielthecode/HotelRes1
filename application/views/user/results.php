<div class="container-fluid">
<div id="slider" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>assets/img/room1.jpg" alt="Los Angeles" width="1600" height="500">
      <div class="carousel-caption">
    <h1>The Pacific Room</h1>
    <p>We had such a great time in LA!</p>
  </div>
    </div>

    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>assets/img/room2.jpg" alt="Chicago" width="1600" height="500">
      <div class="carousel-caption">
    <h1>The Deluxe Room</h1>
    <p>We had such a great time in LA!</p>
  </div>
    </div>

    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>assets/img/room3.jpg" alt="New York" width="1600" height="500">
      <div class="carousel-caption">
    <h1>The Pacific Room</h1>
    <p>We had such a great time in LA!</p>
  </div>
    </div>

  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#slider" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#slider" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
<br>
<div class="container">
<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="control-label" for="check_in">Check-In Date</label>
      <input class="form-control" id="check_in" name="check_in" value= "<?php echo $_SESSION['checkin']?>" type="text" disabled/>
    </div>

    <div class="col-md-6 mb-3">
      <label for="check_out">Check-out Date</label>
      <input  id="date" type="text" class="form-control" name="check_out"  value= "<?php echo $_SESSION['checkout']?>" disabled/>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="number_of_guests">Number of Guests</label>
      <select class="form-control" name="number_guest" disabled>
      <option value= "<?php echo $_SESSION['checkout']?>"><?php echo $_SESSION['checkout']?></option>
      
      </select>
    </div>

    <div class="col-md-3 mb-3">
      <label for="room_no">Room Type</label>
      <select class="form-control" name="room_no" disabled>
        <?php 

        foreach($room AS $room) { ?>
        <option value="<?php echo $room->room_no; ?>"><?php echo $room->room_type; ?></option>
        <?php } ?>
      </select>
    </div>

  </div>

  <button class="btn btn-secondary btn-md" name="search">Search</button>
</div>

