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
        $query = "SELECT * FROM employee WHERE username='$username'
and password='$password'";
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
	<div class="login-form">
 <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="login">
	 <h2 class="text-center">Admin Sign-In</h2>
	 <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
	 <div class="form-group">
			 <input type="text" name="username" class="form-control" placeholder="Username" required />
	 </div>

	 <div class="form-group">
			  <input type="password" name="password" class="form-control" placeholder="Password" required />
	 </div>

	 <div class="form-group">
		 <button type="submit" class="btn btn-dark btn-block" name="submit">Sign-In</button>
	 </div>
 </form>

 </div>
 </div>

<?php
//include header template
require('layout/footer.php');
?>
