<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Guests</h1>
          <p>
            This shows a list of All the Guest registered on the hotel site.
            
          </p>
        </div>
</div>
          <br>
          <div class="container">
          <?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>
<table id="mytable" class="table table-reponsive table-bordered">
              <thead>
                <tr>
                <th>Guest ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th solspan="2" style="width:20%;text-align:center">Actions</th>
                </tr>
              </thead>
              <tbody>
                 <?php foreach($guests AS $guest): ?>
                    <tr>
                    <td><?php echo $guest->guest_id ?></td>
                    <td><?php echo $guest->first_name ?></td>
                    <td><?php echo $guest->last_name ?></td>
                    <td><?php echo $guest->username ?></td>
                    <td><?php echo $guest->address ?></td>
                    <td><?php echo $guest->phone ?></td>
                    <td><?php echo $guest->email ?></td>
                    <td style="width:20%;text-align:center">
                    <button class="btn btn-primary btn-sm" name="edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm" name="delete"><i class="fa fa-trash"></i></button>
                    </td>
                    </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </main>

      </div>
    </div>

<br>
     