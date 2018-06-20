<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<div class="jumbotron">
        <div class="container">
          <h1>Upload Image</h1>
          <p>
            This is the Upload Image Page.
            Here you can <b>Upload an image for a room</b>
          </p>
          <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>/admin/rooms" role="button">Back To Rooms</a></p>
        </div>
    </div>

<div class="container">
<?php if(isset($_SESSION['success'])) {?>

<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>

<?php } else if(isset($_SESSION['error'])) {?>
<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }  ?>

<?php echo form_open_multipart('admin/do_upload/'.$id);?>

    <div class="form-group row">
    <label for="userfile" class="col-2 col-form-label">Upload Image:</label>
            <div class="col-10">
                <input type="file" name="userfile" class="form-control">
            </div>
    </div>

    <div class="form-group row">
            <div class="col-10">
            <input type="submit" value="upload" />
            </div>
    </div>
</div>

        </main>

      </div>
    </div>
