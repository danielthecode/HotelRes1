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


<div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
          <?php foreach($rooms as $room) {?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="<?php echo base_url();?>uploads/<?php echo $room->room_img?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?php echo $room->room_type?></p>
                  <br>
                  <p class="card-text"> <?php echo $room->room_desc ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    </div>
                    <small class="text-muted">Price: <?php echo $room->room_price ?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
