<div class="container">
   	  <div class="signup-form">
<h2 class="text-center">Sign Up</h2>

<?php if(isset($_SESSION['success'])) {?>
<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>
<?php } ?>


<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form action="" method="POST">
    <div class="form-group">
    <label for="firstname">First Name:</label>
      	<input type="text" name="firstname" id="firstname" class="form-control"  placeholder="First Name" required autofocus>
    </div>

    <div class="form-group">
    <label for="lastname">Last Name:</label>
   		<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
    </div>

    <div class="form-group">
    <label for="email">Email:</label>
      <input type="text" name="email" id="email" class="form-control"  placeholder="Email" required>
    </div>

    <div class="form-group">
    <label for="address">Address:</label>
   		<input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
    </div>

    <div class="form-group">
    <label for="contactno">Phone No:</label>
   		<input type="text" name="contactno" id="contactno" class="form-control" placeholder="Contact No" required>
    </div>

    <div class="form-group">
    <label for="username">Username:</label>
   		<input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
    </div>

    <div class="form-group">
    <label for="password">Password:</label>
   		<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    </div>

    <div class="form-group">
    <label for="password2">Confirm Password:</label>
   		<input type="password" name="password2" id="password" class="form-control" placeholder="Confirm Password" required>
    </div>

    <div class="form-group">
      <button class="btn btn-dark btn-block" name="register">Register</button>
    </div>

    </form>
    <p class="text-center">Alreadyt have an account? <a href="login">Sign-in</a></p>
      </div>

 </div>
