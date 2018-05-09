<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Reservations</h1>
          <p>
            This shows a list of All the reservations in the hotel.
            Here you can <b>
            Edit a reservation.
            And Delete a reservation.</b>
          </p>
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
                <th>Guest ID</th>
                <th>Check-In Date</th>
                <th>Check-out Date</th>
                <th>Number of Guests</th>
                <th>Room Type</th>
                <th solspan="2" style="width:20%;text-align:center">Actions</th>
                </tr>
              </thead>
              <tbody>
                 <?php foreach($reservations AS $reservation): ?>
                    <tr>
                    <td><?php echo $reservation->res_id ?></td>
                    <td><?php echo $reservation->guest_id ?></td>
                    <td><?php echo $reservation->check_in_date ?></td>
                    <td><?php echo $reservation->check_out_date ?></td>
                    <td><?php echo $reservation->no_guests ?></td>
                    <td><?php echo $reservation->room_id ?></td>
                    <td style="width:20%;text-align:center">
                    <a href="<?php echo base_url(); ?>admin/edit_reservation/<?php echo $reservation->res_id; ?>">
                    <button class="btn btn-primary btn-sm" name="edit"><i class="fa fa-edit"></i></button>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/delete_reservation/<?php echo $reservation->res_id; ?>">
                    <button class="btn btn-danger btn-sm" name="delete"><i class="fa fa-trash"></i></button>
                    </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </main>
        <script>

</script>  
      </div>
    </div>

     