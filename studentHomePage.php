<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./studentHomePage.css"> 
</head>
<body>
<h1 id = "heading">Pacman: student</h1>
<div class="shopping-cart">
<!-- <div class="log_btn"><button id="logoutBtn">Logout</button></div> -->
<form method="post" action="studentHomePage.php">
  <div class="input-group">
    <button type="submit" class="log_btn" name="logoutBtn">Logout</button>
  </div>
</form>
<?php
    $s = $_SESSION['username'];
    $query="select * from packages p join warden w on p.warden=w.username where recepient='$s';";
    $result=mysqli_query($db,$query);
    if(mysqli_num_rows($result) > 0){
      echo "<table id=\"data_table\">";
      echo "<tr><th>Package id</th><th>Package Description</th><th>Received by</th><th>Received?</th></tr>";
      while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<th>".$row['pid']."</th>";
        echo "<th>".$row['description']."</th>";
        echo "<th>".$row['name']."</th>";
        echo "<th>"."Add the fucking button"."</th>";
        echo "</tr>";
      }
      echo "</table>";
    }
    else{
      echo "No packages pending";
    }
  ?>
 <!--<tr><td>Aditya</td><td>123456789</td><td>stuff</td><td>Received ;)</td><td><button id="deleteBtn">Delete</button></td></tr>-->

</div>
</body>
</html>