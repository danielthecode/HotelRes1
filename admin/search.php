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
            <form>
              <div class="input-group">
                <input class="form-control"placeholder="I can help you to find anything you want!">
              <div class="input-group-addon" ><i class="fa fa-search"></i></div>
          </div>
          </form>
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
