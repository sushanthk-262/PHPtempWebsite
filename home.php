<?php

session_start();

include("connec.php");
include("func.php");

$userData = checkLogin($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $userId = $userData['userId'];
  $userName = $_POST['name'];
  $password = $_POST['password'];
  $dob = $_POST['dob'];


  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if(!empty($userId) && !empty($password))
  {
    $queryDel = "delete from userdetails where userId = '$userId'";
    $query = "insert into userdetails (userId, userName, password, dob) values ('$userId', '$userName', '$password', '$dob')";

    mysqli_query($con, $queryDel);
    mysqli_query($con, $query);

    header("Location: login.php");
    die;
  }
  else
  {
    echo "Enter valid data!";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<div class="cont" id="cont">	
		<h1 style="align-content: center;">Hello, <?php echo $userData['userName']; ?> !</h1>
	</div>
	<p style="font-size: 70px; font-family: 'Verdana', Sans-serif;">Update your profile details here:</p>
	<div class="cont2" id="cont2">	
		<form class="form" id="bSignup" method="post">
              <h2> Your User id(NOT CHANGEABLE): <?php echo $userData['userId']; ?> </h2>
              <br><br>
              <h2>UserName: <?php echo $userData['userName']; ?></h2>
              <input type="text" class="input_box" name="name" placeholder="Enter your Name" required>
              <br><br>
              <h2>Password: <?php echo $userData['password']; ?></h2>
              <input type="password" class="input_box" name="password" placeholder="Enter your password" required>
              <h2>Date of Birth: <?php echo $userData['dob']; ?></h2>
              <input type="date" class="input_box" name="dob" placeholder="Enter your dob" required>
              <!-- Make sure to check if both password match or not-->
              <br><br><button type="submit" name="submit-btn" onclick = "confirm()" >Submit</button><br><br><br><br><br>
              <script type="text/javascript"> function confirm(){
          	    alert("Details have been updated! Redirecting to Login Page....");}
          	  </script>
            </form>
	</div>

	<input type="checkbox" id="ham-menu">
	<label for="ham-menu">
		<div class="hide-des">
			<span class="menu-line"></span>
			<span class="menu-line"></span>
			<span class="menu-line"></span>
			<span class="menu-line"></span>
			<span class="menu-line"></span>
			<span class="menu-line"></span>
		</div>

	</label>
	<div class="full-page-green"></div>
	<div class="ham-menu">
		<ul class="centre-text bold-text">
			<li>Home</li>
			<li>Edit your Profile</li>
			<a href="resume.php"><li>View Sushanth Kulkarni's resume</li></a>
			<li>Logout</li>
		</ul>
	</div>
</body>
</html>
