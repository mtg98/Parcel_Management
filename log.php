<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./logs.css">
	<title>Search </title>
</head>
<body>
	<h1 id = "searchTitle">Logs</h1>
<div class="topnav">	
 <div class="searchAtCenter">
 	Welcome to the logs... Have a pleasant and tedious search.
   <button type="button" class="btn" id="goBackButton">go back</button>
 </div>
</div>

<table id="data_table">
<?php
    $w = $_SESSION['username'];
    $query="select * from students s join package_backup p on s.id=p.s_id";
    $result=mysqli_query($db,$query);
    if(mysqli_num_rows($result) > 0){
      echo "<table id=\"data_table\">";
      echo "<tr><th>Student Name</th><th>ID No</th><th>Inserted on</th><th>Deleted on</th></tr>";
      while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<th>".$row['name']."</th>";
        echo "<th>".$row['id']."</th>";
				echo "<th>".$row['received_on']."</th>";
				echo "<th>".$row['given_on']."</th>";
        echo "</tr>";
      }
      echo "</table>";
    }
    else{
      echo "No backups. H8xxrs got to your pc";
		}
?>
</body>
</html>