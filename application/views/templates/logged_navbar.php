<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>users/index">The Hotel Bookings</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="nav-item active"><a class="nav-link" href="<?php echo base_url(); ?>users/index">Home</a></li>
      <li><a class="nav-link" href="#">About Us</a></li>
      <li><a class="nav-link" href="#">Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right top-nav">
          <li class="dropdown">
              <a  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><b><?php echo $_SESSION['username']; ?></b></a>
              <ul class="dropdown-menu bg-dark navbar-dark">
                  <li><a class="nav-link" href="<?php echo base_url(); ?>users/reservations">Manage Reservations</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>users/profile"> Edit Profile</a></li>
                  <li class="divider"></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>auth/logout"> Logout</a></li>
              </ul>
          </li>
    </ul>
  </div>
</nav>
