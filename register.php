<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to PacMan</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>ID Number</label>
  	  <input type="text" name="id">
		</div>
  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name">
		</div>
  	<div class="input-group">
  	  <label>Room</label>
  	  <input type="text" name="room">
		</div>
  	<div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="text" name="phone">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group" align = "center">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p align = "center">
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>