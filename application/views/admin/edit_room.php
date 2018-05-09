<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Edit Room</h1>
          <p>
            This is the Edit Room Page.
            Here you can <b>Edit a room</b>
          </p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/rooms" role="button">Back To Rooms</a></p>
        </div>
    </div>

<div class="container">
<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>
<form action="" method="POST" class="col s12">
    

    <div class="form-group row">
    <label for="room_type" class="col-2 col-form-label">Room Type:</label>
        <div class="col-10">
          <select class="form-control" name="room_type" required>
            <option value="<?php echo $room->room_type ?>"><?php echo $room->room_type; ?></option>
            <option value="Penthouse">Penthouse</option>
            <option value="Deluxe Room"> Deluxe Room</option>
            <option value="Superior Room"> Superior Room</option>
            <option value="Executive Room"> Executive Room</option>
            <option value="Pacific Room"> Pacific Room</option>
            <option value="Pacific Suite"> Pacific Suite</option>
            <option value="Deluxe Suite"> Deluxe Suite</option>
            <option value="Executive Suite"> Executive Suite</option>
            <option value="Presidential Suite"> Presidential Suite</option>
          </select>
      </div>
    </div>

    <div class="form-group row">
        <label for="room_price" class="col-2 col-form-label">Room Price:</label>
        <div class="col-10">
            <input type="text" name="room_price" value="<?php echo $room->room_price; ?>" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
            <label for="description" class="col-2 col-form-label">Description:</label>
            <div class="col-10">
                <textarea name="description" cols="30" rows="4" value="<?php echo $room->room_desc; ?>" class="form-control" required></textarea>
            </div>
    </div>

    <div class="form-group row">
            <div class="col-10">
                <button class="btn btn-primary btn-lng" name="update">Update Room</button>
            </div>
        </div>
    
</form>
</div>

        </main>

      </div>
    </div>