
<div class="jumbotron">
        <div class="container">
          <h1>Pending Reservations</h1>
          <p>
            This shows a list of All pending reservations you have made.
          </p>
          <div class="row">
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/index" role="button">Make new reservation</a></p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/reservations_cancelled" role="button">Cancelled Reservations</a></p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/reservations" role="button">Pending Reservations</a></p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/reservations_approved" role="button">Approved Reservations</a></p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/reservations_rejected" role="button">Rejected Reservations</a></p>
        </div>
</div>
</div>
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
              <th>Check-In Date</th>
              <th>Check-out Date</th>
              <th>Number of Guests</th>
              <th>Room Number</th>
              <th>Status</th>
                <th solspan="2" style="width:20%;text-align:center">Actions</th>
              </thead>
              </tr>
              <tbody>
                 <?php foreach($reservation AS $reservation): ?>
                    <tr>
                    <td><?php echo $reservation->res_id ?></td>
                    <td><?php echo $reservation->check_in_date ?></td>
                    <td><?php echo $reservation->check_out_date ?></td>
                    <td><?php echo $reservation->no_guests ?></td>
                    <td><?php echo $reservation->room_id ?></td>
                    <td><?php echo $reservation->status ?></td>
                    <td style="width:20%;text-align:center">
                    <a href="<?php echo base_url(); ?>users/cancel_booking/<?php echo $reservation->res_id; ?>">
                    <button class="btn btn-primary btn-md" name="delete"><i alt="cancel" class="fa fa-remove"></i></button>
                    </a>
                    </td>
                    </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>


<script>
          $(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>
