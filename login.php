<?php
require_once('includes/config.php');
$title = 'Login';
require('layout/header.php');
require('layout/navbar.php');
session_start();
if(isset($_SESSION["username"])){
header("Location: index.php");
exit(); }
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){

	$username = stripslashes($_REQUEST['username']);

	$username = mysqli_real_escape_string($con,$username);


	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);


	//Checking is user existing in the database or not
        $query = "SELECT * FROM guest WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
			$_SESSION['start'] = time();

			$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	$fmsg = "Username/Password Invalid";
	}
    }



 ?>

<div class="container">
 <h1>Log In</h1>
 <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="login">
	 <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
	 <div class="form-group">
		 <label for="username" class="control-label col-sm-2">Username:</label>
			 <div class="col-sm-5">
			 <input type="text" name="username" class="form-control" placeholder="Username" required />
		 </div>
	 </div>

	 <div class="form-group">
		 <label for="password" class="control-label col-sm-2">Password:</label>
			 <div class="col-sm-5">
			  <input type="password" name="password" class="form-control" placeholder="Password" required />
		 </div>
	 </div>

	 <div class="form-group">
		 <label class="control-label col-sm-2"></label>
		 <div class="col-sm-5">
		 <input type="submit" class="btn btn-dark btn-block" name="submit" value="Login"/>
		 </div>
	 </div>
 </form>

 <div class="form-group">
	 <p class="control-label col-sm-2">
		 <div class="col-sm-5">
		 Not registered yet? <a href='register.php'>Register Here</a></p>
	 </div>
 </div>
</form>

 </div>

<?php
//include header template
require('layout/footer.php');
?>
