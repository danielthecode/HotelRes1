




 <div class="jumbotron">
 <h1> User Profile </h1>
 </div>


<div class="container">


<?php foreach($profile as $profile) { ?>

 <div class="row">
      <strong class="col-sm-1">Firstname:</strong>
      <div class="col-sm-3"><?php echo $profile->first_name; ?></div>
    </div>

    <div class="row">
      <strong class="col-sm-1">Lastname:</strong>
      <div class="col-sm-3"><?php echo $profile->last_name; ?></div>
    </div>

    <div class="row">
        <strong class="col-sm-1">Address:</strong>
        <div class="col-sm-3"><?php echo $profile->address; ?></div>
    </div>

    <div class="row">
        <strong class="col-sm-1">Phone:</strong>
        <div class="col-sm-3"><?php echo $profile->phone; ?></div>
    </div>

    <div class="row">
        <strong class="col-sm-1">Email:</strong>
        <div class="col-sm-3"><?php echo $profile->email; ?></div>
    </div>

		</div>

		<br>

<?php } ?>
