<div class="container">
	<div class="login-form">
    <h2 class="text-center">Admin Sign-In</h2>

    <?php if(isset($_SESSION['success'])) {?>

    <div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
	<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

 <form action="" method="post" >
	 <div class="form-group">
			 <input type="text" name="username" class="form-control" placeholder="Username" required />
	 </div>

	 <div class="form-group">
			  <input type="password" name="password" class="form-control" placeholder="Password" required />
	 </div>

	 <div class="form-group">
		 <button class="btn btn-dark btn-block" name="login">Sign-In</button>
	 </div>
 </form>

 </div>
 </div>