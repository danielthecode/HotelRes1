
<br>

<div class="jumbotron">
        <div class="container">
          <h1>Rooms</h1>
          <p>
            This shows a list of All the rooms in the hotel.
            Here you can
            <br><b>Add a room.
            <br>
            Edit a room.
            <br>
            And Delete a room.</b>
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
                    <a href="<?php echo base_url(); ?>admin/delete_room/<?php echo $reservation->res_id; ?>">
                    <button class="btn btn-primary btn-md" name="delete"><i class="fa fa-remove"></i></button>
                    </a>
                    </td>
                    </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
<br>

<script>
          $(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>
