<?php
if (isset($error)){
    echo "<div class='error'>$error</div>";
}?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title><?php echo (isset($title)) ? $title : "My CI Site" ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />





<script>
$().ready(function() {
	$("#adminloginform").validate();
 });


</script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">
    <div class="col-md-5 col-md-offset-1">
      <h2>
        Sign in to admin
      </h2>
      <p>
        Use your email to sign in.<br>
        
      </p><br>
      
    </div>
    <div class="col-md-5">
      <br>
	  <?php 
	  $attributes = array('name' => 'adminlogin','id'=>'adminloginform');
	  echo form_open("user/login",$attributes );  ?>
	  
        <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Username</label>
            <input class="form-control" id="txtusername" name="email" type="email" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Password</label> <span class="help"></span>
            <input class="form-control" id="txtpassword" name="pass" type="password" required>
          </div>
        </div>
        <div class="row">
          <div class="control-group col-md-10">
            <div class="checkbox checkbox check-success">
              <a href="#">Trouble login in?</a>&nbsp;&nbsp; <input id="checkbox1" type="checkbox" value="1"> <label for=
              "checkbox1">Keep me reminded</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <button class="btn btn-primary btn-cons pull-right" type="submit">Login</button>
          </div>
        </div>
       <?php echo form_close(); ?>
    </div>
  </div>
</div>
<!-- END CONTAINER -->


<!-- END Page Level JS-->

</body>
</html>