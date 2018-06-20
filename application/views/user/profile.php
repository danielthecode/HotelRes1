



<br>

<div class="jumbotron">
        <div class="container">
          <h1>User Profile</h1>
          <p>
            This is your information
          </p>
          <div class="row">
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/edit_profile" role="button">Edit Profile</a></p>
          <br>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/index" role="button">Back Home</a></p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/users/change_password" role="button">Change Password</a></p>
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

<?php foreach($profile as $profile) { ?>

<table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Firstname:</td>
                        <td><?php echo $profile->first_name; ?></td>
                      </tr>
                      <tr>
                        <td>Lastname:</td>
                        <td><?php echo $profile->last_name; ?></td>
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <td><?php echo $profile->address; ?></td>
                      </tr>
                        <tr>
                        <td>Phone Number:</td>
                        <td><?php echo $profile->phone; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $profile->email; ?></td>
                      </tr>
                     
                    </tbody>
                  </table>

		
<?php } ?>
</div>
