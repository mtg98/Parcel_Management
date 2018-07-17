<?php include('server.php') ?> 
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to PacMan</title>
  <link rel="stylesheet" href="insertPage.css">
</head>
<body>
  <div class="header">
  	<h2>Pacman: Register</h2>
  </div>
  <form method="post" action="insertPage.php">
    <?php include('errors.php') ?>
    <div class="input-group">
  	  <label>ID Number of Package Owner</label>
  	  <input type="text" name="student_id">
  	</div>
  	<div class="input-group">
      <label>Description</label>
      <input type="text" name="description" >
    </div>
  	<div class="input-group" align="center">
  	  <button type="submit" class="btn" name="insertPackage">Insert</button>
  	</div>
  </form>
</body>
</html>