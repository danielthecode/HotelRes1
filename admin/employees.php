<?php
require_once('includes/config.php');
include("includes/auth.php");
require('layout/header.php');
$title = 'Guests';
require('layout/nav_loggedin.php');
?>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Guests</h1>
          </div>
          <br>
          <div class="container">
            <table class="table">
              <thead>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM employee";
                $result = mysqli_query($con, $query);
                while ($rows = mysqli_fetch_assoc($result)) {
                  echo '
                    <tr>
                    <td>'.$rows['employee_id'].'</td>
                    <td>'.$rows['first_name'].'</td>
                    <td>'.$rows['last_name'].'</td>
                    <td>'.$rows['username'].'</td>
                    <td>'.$rows['address'].'</td>
                    <td>'.$rows['phone_no'].'</td>
                    <td>'.$rows['email'].'</td>
                    </tr>
                  ';
                }
                 ?>
              </tbody>
            </table>
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
