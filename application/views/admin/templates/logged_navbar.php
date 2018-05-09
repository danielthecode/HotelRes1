<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">The Hotel Booking</a>
  <ul class="nav navbar-nav navbar-right top-nav">
        <li class="dropdown">
            <a  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><b><?php echo $_SESSION['admin_username'] ?></b></a>
            <ul class="dropdown-menu bg-dark navbar-dark">
                <li><a class="nav-link" href="manage.php">Manage Reservations</a></li>
                <li><a class="nav-link" href="profile.php"> Edit Profile</a></li>
                <li><a class="nav-link" href="#">Change Password</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="<?php echo base_url(); ?>/admin_auth/logout"> Logout</a></li>
            </ul>
        </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search">
              <span data-feather="search"></span>
              Search
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/reservations">
              <span data-feather="file"></span>
              Reservations
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/guests">
              <span data-feather="users"></span>
              Guests
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Hotel Facilities</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Manage Hotels
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/rooms">
              <span data-feather="file-text"></span>
            Manage Rooms
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/employees">
              <span data-feather="file-text"></span>
              Manage Employees
            </a>
          </li>
        </ul>
      </div>
    </nav>
