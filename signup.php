<?php
session_start();

include("connec.php");
include("func.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $userId = $_POST['id'];
  $userName = $_POST['name'];
  $password = $_POST['password'];
  $dob = $_POST['dob'];

  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if(!empty($userId) && !empty($password))
  {
    $query = "insert into userdetails (userId, userName, password, dob) values ('$userId', '$userName', '$password', '$dob')";

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
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="cont" id="cont">
  <div class="card" id="cid">
        <div class="inner-box" id="iBox">
          <div class="card-front">
            <h2>Sign Up</h2><hr><br>
            <form class="form" id="bSignup" method="post">
              <h2>User id:</h2>
              <input type="number" class="input_box" name="id" placeholder="Enter a new User id" required>
              <br><br>
              <h2>UserName:</h2>
              <input type="text" class="input_box" name="name" placeholder="Enter your Name" required>
              <br><br>
              <h2>Password:</h2>
              <input type="password" class="input_box" name="password" placeholder="Enter your password" required>
              <h2>Date of Birth</h2>
              <input type="date" class="input_box" name="dob" placeholder="Enter your dob" required>
              <!-- Make sure to check if both password match or not-->
              <br><br><button type="submit" name="submit-btn">Submit</button><br><br><br><br><br>
              <br><br><a href="login.php"><button type="button" name="new-btn">I already have an account dummy!</button><br><br><br><br></a>
            </form>
          </div>
        </div>  
      </div>
</div>
<script>
function openSignup()
  {
    var ele = document.getElementById('iBox'); 
    ele.style.transform = "rotateY(-180deg)";
  }

  function openLogin()
  {
    var ele = document.getElementById('iBox');
    ele.style.transform = "rotateY( 0deg)";
  }
</script>

</body>
</html>