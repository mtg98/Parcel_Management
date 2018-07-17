<?php
session_start();

// initializing variables
$username = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'adminpass', 'package_manager');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $room = mysqli_real_escape_string($db, $_POST['room']);
  $phone = intval(mysqli_real_escape_string($db, $_POST['phone']));
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($id)) { array_push($errors, "ID is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($room)) { array_push($errors, "Room No is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username.
  $user_check_query = "SELECT * FROM students WHERE id='$id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    
  	$query = "INSERT INTO students VALUES('$id',$phone,'$room','$name','$password');";
    //array_push($errors,$query);
    mysqli_query($db, $query);
  	$_SESSION['username'] = $id;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    //array_push($errors,$password);
    if(array_key_exists('isWarden',$_POST)) {
      //Warden handle
      $query = "SELECT * from warden where username = '$username' AND password='$password';";
      $results = mysqli_query($db, $query);
      $num_rows = 0;//mysqli_num_rows($results);
      while ($row = mysqli_fetch_array($results)){
        $num_rows += 1;
      }
      if ($num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: adminHomePage.php');
      }else {
        array_push($errors, "Wrong username/password combination.");
        //array_push($errors, $num_rows);
        //array_push($errors, $query);
      }
    }else{
      $query = "SELECT * FROM students WHERE id='$username' AND password='$password';";
      $results = mysqli_query($db, $query);
      $num_rows = 0;//mysqli_num_rows($results);
      while ($row = mysqli_fetch_array($results)){
        $num_rows += 1;
      }
      if ($num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: studentHomePage.php');
      }else {
        array_push($errors, "Wrong username/password combination.");
        //array_push($errors, $query);
      }
    }
  }
}

//Logout from student/admin
if (isset($_POST['logoutBtn'])){
  if(isset($_SESSION['username'])){
    session_destroy();
    unset($_SESSION['username']);  
  }
  header("location: login.php");
}

//To goto insert package
if(isset($_POST['insertBtn'])){
  header('location: insertPage.php');
}

//Insert Package
if(isset($_POST['insertPackage'])){
  $student_id = mysqli_real_escape_string($db, $_POST['student_id']);
  $description = mysqli_real_escape_string($db, $_POST['description']);

  if(empty($student_id)){array_push($errors,"Don't leave the student box blank");}
  if(empty($description)){array_push($errors,"Don't leave the description blank");}

  if(count($errors)==0){  
    $user_check_query = "SELECT * FROM students WHERE id='$student_id' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists  
      $warden = $_SESSION['username'];
      $stud_id = $user['id'];
      $query = "insert into packages (recepient,warden,description) values('$stud_id','$warden','$description');";
      //array_push($errors,$query); 
      mysqli_query($db,$query);
      header('location: adminHomePage.php');
    }else{
      array_push($errors, "Username doesn't exists");
    }
  }
}

//GOTO backup page
if(isset($_POST['backup'])){
  header('location: log.php');
}
?>

