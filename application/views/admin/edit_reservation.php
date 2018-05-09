<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Edit Room</h1>
          <p>
            This is the Edit Room Page.
            Here you can <b>Edit a room</b>
          </p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/reservations" role="button">Back To Rooms</a></p>
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
    <label for="approval" class="col-2 col-form-label">Approval:</label>
        <div class="col-10">
        <select class="form-contro;" name="approval" id="">
        <option value=""></option>
        <option value="Approved">approved</option>
        </select>
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