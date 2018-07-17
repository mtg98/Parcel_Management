<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./adminHomePage.css"> 
</head>
<body>
<h1 id="heading" align="center">Admin Console</h1>
<div class="shopping-cart">
<!--<div class="ins_log_btns"><button id="insertBtn">Insert</button>-->
<!--<button id="logoutBtn">Logout</button></div>-->
<form method="post" action="adminHomePage.php">
  <div class="input-group"></div> 
  <div class="input-group">
    <button type="submit" class="ins_log_btns" name="insertBtn" align="left">Insert</button>
    <button type="submit" class="log_btn" name="logoutBtn">Logout</button>
    <button type="submit" class="ins_log_btn" name="backup">Backups</button>
  </div>
  <br>
</form>
<h2 align="center">Packages in your possesion</h2>
  <?php
    $w = $_SESSION['username'];
    $query="select * from students s join packages p on s.id=p.recepient where p.warden='$w'";
    $result=mysqli_query($db,$query);
    if(mysqli_num_rows($result) > 0){
      echo "<table id=\"data_table\">";
      echo "<tr><th>Student Name</th><th>ID No</th><th>Room Number</th><th>Description</th></tr>";
      while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<th>".$row['name']."</th>";
        echo "<th>".$row['id']."</th>";
        echo "<th>".$row['room']."</th>";
        echo "<th>".$row['description']."</th>";
        echo "</tr>";
      }
      echo "</table>";
    }
    else{
      echo "No packages in your possesion";
    }
  ?>
  <!--<tr><td>Aditya</td><td>123456789</td><td>stuff</td><td>Received ;)</td></tr>-->

</div>
</body>
</html>