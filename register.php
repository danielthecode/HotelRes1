<?php
require_once('includes/config.php');
$title = 'Register';
require('layout/header.php');
require('layout/navbar.php');

// If form submitted, insert values into the database.
if (isset($_REQUEST['submit'])){
        // removes backslashes
  $firstname = stripslashes($_REQUEST['firstname']);
  	$firstname = mysqli_real_escape_string($con,$firstname);
  $lastname = stripslashes($_REQUEST['lastname']);
  	$lastname = mysqli_real_escape_string($con,$lastname);
  $username = stripslashes($_REQUEST['username']);
  	$username = mysqli_real_escape_string($con,$username);
  $password = stripslashes($_REQUEST['password']);
  	$password = mysqli_real_escape_string($con,$password);
	$address = stripslashes($_REQUEST['address']);
  	$address = mysqli_real_escape_string($con,$address);
  $phone = stripslashes($_REQUEST['contactno']);
  	$phone = mysqli_real_escape_string($con,$phone);
  $email = stripslashes($_REQUEST['email']);
  	$email = mysqli_real_escape_string($con,$email);


        $query = "INSERT into guest (first_name, last_name, username, password, address, phone, email)
VALUES ('$firstname', '$lastname','$username', '".md5($password)."','$address','$phone', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
              echo "<div class='form'>
  <h3>You are registered successfully.</h3>
  <br/>Click here to <a href='login.php'>Login</a></div>";
          }
      }else{


 ?>
<div class="container">
   	  <div class="signup-form">
 	<form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<h2 class="text-center">Sign Up</h2>
    <div class="form-group">
      	<input type="text" name="firstname" id="inputFirstName" class="form-control"  placeholder="First Name" required autofocus>
    </div>

    <div class="form-group">
   		<input type="text" name="lastname" id="inputLastName" class="form-control" placeholder="Last Name" required>
    </div>

    <div class="form-group">
      <input type="text" name="email" id="inputEmail" class="form-control"  placeholder="Email" required>
    </div>

    <div class="form-group">
   		<input type="text" name="address" id="inputAddress" class="form-control" placeholder="Address" required>
    </div>

    <div class="form-group">
   		<input type="text" name="contactno" id="inputContactNo" class="form-control" placeholder="Contact No" required>
    </div>

    <div class="form-group">
   		<input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required>
    </div>

    <div class="form-group">
   		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-dark btn-block" name="submit">Register</button>
    </div>
        </form>
        <p class="text-center">Alredy have an account? <a href="login.php">Sign-In</a></p>
      </div>

 </div>

<?php } ?>

<?php
//include header template
require('layout/footer.php');
?>
