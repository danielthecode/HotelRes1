<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Change Password</h1>
          <p>
            
            Here you can <b>Change your current password</b>
          </p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/reservations" role="button">Back to Dashboard</a></p>
        </div>
    </div>

<div class="container">
<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>


<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form action="" method="POST" class="col s12">
    



    <div class="form-group row">
    <label for="cpassword" class="col-2 col-form-label">Current Password:</label>
        <div class="col-10">
        <input type="password" name="cpassword"  class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
        <label for="npassword" class="col-2 col-form-label">New Password:</label>
        <div class="col-10">
            <input type="password" name="npassword"  class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
            <label for="cnpassword" class="col-2 col-form-label">Confirm New Passowrd:</label>
            <div class="col-10">
            <input type="password" name="cnpassword"  class="form-control" required>
            </div>
    </div>

    <div class="form-group row">
            <div class="col-10">
                <button class="btn btn-primary btn-lng" name="update">Update</button>
            </div>
        </div>

</form>
</div>

</main>

</div>
</div>