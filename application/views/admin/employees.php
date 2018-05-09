<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Employees</h1>
          <p>
            This shows a list of All the Employees working for the hotel.
            <br>
            Here you can
            <br><b>Add a new Employee.
            <br>
            Edit an Employees Details.
            <br>
            And Delete an Employee.</b>
          </p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/add_employee" role="button">Add New Employee</a></p>
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
              <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th solspan="2" style="width:20%;text-align:center">Actions</th>
              </thead>
              <tbody>
                 <?php foreach($employees AS $employee): ?>
                    <tr>
                    <td><?php echo $employee->employee_id ?></td>
                    <td><?php echo $employee->first_name ?></td>
                    <td><?php echo $employee->last_name ?></td>
                    <td><?php echo $employee->username ?></td>
                    <td><?php echo $employee->address ?></td>
                    <td><?php echo $employee->phone_no ?></td>
                    <td><?php echo $employee->email ?></td>
                    <td style="width:20%;text-align:center">
                    <a href="<?php echo base_url(); ?>admin/edit_employee/<?php echo $employee->employee_id; ?>">
                    <button class="btn btn-primary btn-sm" name="edit"><i class="fa fa-edit"></i></button>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/delete_employee/<?php echo $employee->employee_id; ?>">
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

     