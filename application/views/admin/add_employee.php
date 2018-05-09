<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Add New Employee</h1>
          <p>
            This is the Add New Employee Page.
            <br>
            Here you can <b>Add a new Employee</b>
          </p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/employees" role="button">Back To Employees</a></p>
        </div>
    </div>

<div class="container">
<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form action="" method="POST" class="col s12">

    <div class="form-group row">
        <label for="first_name" class="col-2 col-form-label">First Name:</label>
        <div class="col-10">
            <input type="text" name="first_name" value="" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
            <label for="last_name" class="col-2 col-form-label">Last Name:</label>
            <div class="col-10">
                <textarea name="last_name" cols="30" rows="4" class="form-control" required></textarea>
            </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-2 col-form-label">Address:</label>
        <div class="col-10">
            <input type="text" name="address" value="" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="phone_no" class="col-2 col-form-label">Phone Number:</label>
        <div class="col-10">
            <input type="text" name="phone_no" value="" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="wmail" class="col-2 col-form-label">Email:</label>
        <div class="col-10">
            <input type="text" name="email" value="" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-2 col-form-label">Username:</label>
        <div class="col-10">
            <input type="text" name="room_price" value="" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-2 col-form-label">Password:</label>
        <div class="col-10">
            <input type="password" name="password" value="" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="password2" class="col-2 col-form-label">Confirm Password:</label>
        <div class="col-10">
            <input type="password" name="password2" value="" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
            <div class="col-10">
                <button class="btn btn-primary btn-lng" name="add">Add New Employee</button>
            </div>
        </div>
    
</form>
</div>

        </main>

      </div>
    </div>