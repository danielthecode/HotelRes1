<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
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
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/add_room" role="button">Add New Room</a></p>
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
                <th>Room No</th>
                <th>Room Type</th>
                <th>Room Price</th>
                <th>Room Description</th>
                <th>Room Image</th>
                <th solspan="2" style="width:20%;text-align:center">Actions</th>
              </thead>
              </tr>
              <tbody>
                 <?php foreach($rooms AS $room): ?>
                    <tr>
                    <td><?php echo $room->room_no ?></td>
                    <td><?php echo $room->room_type ?></td>
                    <td><?php echo $room->room_price ?></td>
                    <td><?php echo $room->room_desc ?></td>
                    <td><?php echo $room->room_img ?></td>
                    <td style="width:20%;text-align:center">
                    <a href="<?php echo base_url(); ?>admin/edit_room/<?php echo $room->room_no; ?>">
                    <button class="btn btn-primary btn-sm" name="edit"><i class="fa fa-edit"></i></button>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/delete_room/<?php echo $room->room_no; ?>">
                    <button class="btn btn-danger btn-sm" name="delete"><i class="fa fa-trash"></i></button>
                    </a>
                    </td>
                    </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          

        </main>

      </div>
    </div>

     