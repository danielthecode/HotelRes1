<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Edit employee</h1>
          <p>
            This is the Edit employee Page.
            Here you can <b>Edit a employee</b>
          </p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/employees" role="button">Back To employees</a></p>
        </div>
    </div>

<div class="container">
<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>
<form action="" method="POST" class="col s12">
    

    <div class="form-group row">
    <label for="address" class="col-2 col-form-label">Address:</label>
        <div class="col-10">
        <input type="text" name="address" value="<?php echo $employee->address; ?>" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
        <label for="phone_no" class="col-2 col-form-label">Phone No:</label>
        <div class="col-10">
            <input type="text" name="phone_no" value="<?php echo $employee->phone_no; ?>" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
            <label for="email" class="col-2 col-form-label">Email:</label>
            <div class="col-10">
            <input type="text" name="email" value="<?php echo $employee->email; ?>" class="form-control" required>
            </div>
    </div>

    <div class="form-group row">
            <div class="col-10">
                <button class="btn btn-primary btn-lng" name="update">Update employee</button>
            </div>
        </div>
    
</form>
</div>

        </main>

      </div>
    </div>