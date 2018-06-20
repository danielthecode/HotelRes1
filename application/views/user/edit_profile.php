
<div class="jumbotron">
        <div class="container">
          <h1>Edit Profile</h1>
          <p>
            This is the Edit Profile Page.
            Here you can <b>Edit your profile</b>
          </p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/profile" role="button">Back to Profile</a></p>
        </div>
    </div>

<div class="container">
<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>
<form action="" method="POST" class="col s12">
    

    <?php foreach($profile as $profile) { ?>

    <div class="form-group row">
    <label for="address" class="col-2 col-form-label">Address:</label>
        <div class="col-10">
        <input type="text" name="address" value="<?php echo $profile->address; ?>" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
        <label for="phone_no" class="col-2 col-form-label">Phone No:</label>
        <div class="col-10">
            <input type="text" name="phone" value="<?php echo $profile->phone; ?>" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
            <label for="email" class="col-2 col-form-label">Email:</label>
            <div class="col-10">
            <input type="text" name="email" value="<?php echo $profile->email; ?>" class="form-control" required>
            </div>
    </div>

    <div class="form-group row">
            <div class="col-10">
                <button class="btn btn-primary btn-lng" name="update">Update</button>
            </div>
        </div>
    <?php } ?>
</form>
</div>