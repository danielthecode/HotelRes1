<div class="container">
	<div class="login-form">
    <h2 class="text-center">Sign-In</h2>

<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

 <form action="" method="POST">
	 
	 <div class="form-group">
     <label for="username">Username:</label>
			 <input type="text" name="username" class="form-control" placeholder="Username" required />
	 </div>

	 <div class="form-group">
     <label for="password">Password:</label>
			  <input type="password" name="password" class="form-control" placeholder="Password" required />
	 </div>

	 <div class="form-group">
		 <button class="btn btn-dark btn-block" name="login">Login</button>
	 </div>
	 <div class="clearfix">
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>
 </form>
<p class="text-center">Don't have an account? <a href="register">Create an Account</a></p>
 </div>
 </div>