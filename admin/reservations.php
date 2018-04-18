<?php
require_once('includes/config.php');
include("includes/auth.php");
require('layout/header.php');
$title = 'Reservations';
require('layout/nav_loggedin.php');
?>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Reservations</h1>
          </div>
          <br>
          <div class="container">
            <table class="table">
              <thead>
                <th>Reservation ID</th>
                <th>Guest ID</th>
                <th>Check-In Date</th>
                <th>Check-out Date</th>
                <th>Number of Guests</th>
                <th>Room Type</th>
                <th>Approved</th>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM reservation";
                $result = mysqli_query($con, $query);
                while ($rows = mysqli_fetch_assoc($result)) {
                  echo '
                    <tr>
                    <td>'.$rows['res_id'].'</td>
                    <td>'.$rows['guest_id'].'</td>
                    <td>'.$rows['check_in_date'].'</td>
                    <td>'.$rows['check_out_date'].'</td>
                    <td>'.$rows['number_of_guests'].'</td>
                    <td>'.$rows['room_type'].'</td>
                    <td>'.$rows['approved'].'</td>
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
