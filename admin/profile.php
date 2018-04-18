<?php
require_once('includes/config.php');
include("includes/auth.php");
require('layout/header.php');
$title = 'Profile';
require('layout/nav_loggedin.php');
$suser = $_SESSION['username'];
?>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profile</h1>
          </div>
          <br>
          <div class="container">
         <div class="jumbotron">
           <h1> Account Details </h2>
         </div>
         <?php
           $query = "SELECT first_name, last_name, address, phone_no, email FROM `employee` WHERE username='$suser'";
           $result = mysqli_query($con,$query) or die(mysql_error());
           while ($rows = mysqli_fetch_assoc($result)) {
             echo '


             <div class="row">
               <strong class="col-sm-1">Firstname:</strong>
               <div class="col-sm-3">'.$rows['first_name'].'</div>
             </div>

             <div class="row">
               <strong class="col-sm-1">Lastname:</strong>
               <div class="col-sm-3">'.$rows['last_name'].'</div>
             </div>

             <div class="row">
                 <strong class="col-sm-1">Address:</strong>
                 <div class="col-sm-3">'.$rows['address'].'</div>
             </div>

             <div class="row">
                 <strong class="col-sm-1">Phone:</strong>
                 <div class="col-sm-3">'.$rows['phone_no'].'</div>
             </div>

             <div class="row">
                 <strong class="col-sm-1">Email:</strong>
                 <div class="col-sm-3">'.$rows['email'].'</div>
             </div>

             ';
           }
          ?>

          <a href="index.php">Back to Dashboard</a>


         </div>

        </main>

      </div>
    </div>



    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>




    <?php
    //include header template
    require('layout/footer.php');
    ?>
