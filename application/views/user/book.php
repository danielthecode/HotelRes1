
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

<?php foreach ($room as $room) {?>

      <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="<?php echo base_url(); ?>uploads/<?php echo $room->room_img?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?php echo $room->room_type?></p>
                  <br>
                  <p class="card-text"> <?php echo $room->room_desc ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <b>Price: <?php echo $room->room_price ?></b>
                  </div>
                </div>
              </div>
            </div>

<br>
   <div class="col-md-1 ">
     <label ><b>Check-In Date</b></label>
         <p ><?php echo $_SESSION['checkin'];?></p>
   </div>

   <div class="col-md-1">
     <label class="control-label"><b>Check-Out Date</b></label>
        <p > <?php echo $_SESSION['checkout'];?></p>
      </div>

      <div class="col-md-1">
         <label class="control-label"><b>Number of Guests</b></label>
            <p style="text-align:center"> <?php echo $_SESSION['no_guests'];?></p>
          </div>
          <form action="" method="POST" >



                <input id="date" name="check_in" placeholder="MM/DD/YYY" value="<?php echo $_SESSION['checkin'];?>" type="hidden" readonly/>

                <input placeholder="MM/DD/YYY" id="date" type="hidden" class="form-control"  value="<?php echo $_SESSION['checkout'];?>" name="check_out" readonly/>

                <input  type="hidden" class="form-control"  value="<?php echo $_SESSION['no_guests'];?>" name="no_guests" readonly/>

                <input  type="hidden" class="form-control"  value="<?php echo $room->room_no;?>" name="room_no" readonly/>

                <input type="hidden" class="form-control"  value="<?php echo $room->room_type;?>" name="room_type"readonly/>

             <?php } ?>

          <?php
                          $this->session->set_flashdata('result', $_SESSION['result'] );
                          $this->session->set_flashdata('checkin', $_SESSION['checkin'] );
                          $this->session->set_flashdata('checkout', $_SESSION['checkout']);
                          $this->session->set_flashdata('no_guests', $_SESSION['no_guests']); ?>
            <button class="btn btn-secondary btn-md" name="book">Book</button>
          </form>
</div>







</div>
