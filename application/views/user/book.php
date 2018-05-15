
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
      <img src="<?php echo base_url(); ?>assets/img/room1.jpg" alt="Los Angeles" width="100%" height="500">
      <div class="carousel-caption">
    <h1>The Pacific Room</h1>
    <p>We had such a great time in LA!</p>
  </div>
    </div>

    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>assets/img/room2.jpg" alt="Chicago" width="100%" height="500">
      <div class="carousel-caption">
    <h1>The Deluxe Room</h1>
    <p>We had such a great time in LA!</p>
  </div>
    </div>

    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>assets/img/room3.jpg" alt="New York" width="100%" height="500">
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
<br>

<div class="container-fluid">

        

<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>
<form class="container" action="" method="POST" >

  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="control-label" for="check_in">Check-In Date</label>
      <input class="form-control" id="date" name="check_in" placeholder="MM/DD/YYY" value="<?php echo $_SESSION['checkin'];?>" type="text" readonly/>
    </div>

    <div class="col-md-6 mb-3">
      <label for="check_out">Check-out Date</label>
      <input placeholder="MM/DD/YYY" id="date" type="text" class="form-control"  value="<?php echo $_SESSION['checkout'];?>" name="check_out" readonly/>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="number_of_guests">Number of Guests</label>
      <input  type="text" class="form-control"  value="<?php echo $_SESSION['no_guests'];?>" name="no_guests" readonly/>
    </div>

    
    <?php foreach ($room as $room) {?>
    <div class="col-md-6 mb-3">
      <label for="room_no">Room No</label>
      <input  type="text" class="form-control"  value="<?php echo $room->room_no;?>" name="room_no" readonly/>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="room_type">Room Type</label>
      <input type="text" class="form-control"  value="<?php echo $room->room_type;?>" name="room_type"readonly/>
    </div>
    </div>
   <?php } ?>

<?php
                $this->session->set_flashdata('checkin', $_SESSION['checkin'] );
                $this->session->set_flashdata('checkout', $_SESSION['checkout']);
                $this->session->set_flashdata('no_guests', $_SESSION['no_guests']); ?>
  <button class="btn btn-secondary btn-md" name="book">Book</button>
</form>
</div>
<br>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="check_in"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        startDate: new Date(),
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    });


    $(document).ready(function(){
      var date_input=$('input[name="check_out"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        startDate: new Date(),
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    });
</script>


