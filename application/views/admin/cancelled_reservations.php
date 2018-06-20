<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>

<br>

<div class="jumbotron">
        <div class="container">
          <h1>Cancelled Reservations</h1>
          <p>
            This shows a list of All the reservations  made.
          </p>
          <div class="row">
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/reservations_pending" role="button">Pending Reservations</a></p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/reservations_rejected" role="button">Rejected Reservations</a></p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/reservations_approved" role="button">Approved Reservations</a></p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/reservations_cancelled" role="button">Cancelled Reservations</a></p>
        </div>
</div>
</div>
          <br>
          <br>
          <div class="container">
          <?php if(isset($_SESSION['success'])) {?>

            <div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

            <?php } else if(isset($_SESSION['error'])) {?>
            <div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
            <?php }  ?>
            <table id="mytable" class="table table-reponsive table-bordered">
                          <thead>
                          <tr>
                          <th>Reservation ID</th>
                            <th>Guest ID</th>
                            <th>Check-In Date</th>
                            <th>Check-out Date</th>
                            <th>Number of Guests</th>
                            <th>Room Number</th>
                            <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php foreach($reservation AS $reservation): ?>
                                <tr>
                                <td><?php echo $reservation->res_id ?></td>
                                <td><?php echo $reservation->guest_id ?></td>
                                <td><?php echo $reservation->check_in_date ?></td>
                                <td><?php echo $reservation->check_out_date ?></td>
                                <td><?php echo $reservation->no_guests ?></td>
                                <td><?php echo $reservation->room_id ?></td>
                                <td><?php echo $reservation->status ?></td>
                                </tr>

                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>

                      </main>
                      </div>
                      </div>


            <script>
                      $(document).ready(function() {
                $('#mytable').DataTable();
            } );
            </script>