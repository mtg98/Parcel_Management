<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to BITS Package Management System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
	  </div>  
  	<div class="input-group" align = "center">
		<button type="submit" class="btn" name="login_user">Login</button>
	</div>
	<br>
	<div>
		<p align = "center"> 	 
			<input type="checkbox" name="isWarden" value="isWarden">Tick if you are the warden<br>
		</p>
		<br>
		<p align = "center">
  			New Student? <a href="register.php">Sign up</a>
		</p>
	</div>
	</form>
	
</body>
</html>