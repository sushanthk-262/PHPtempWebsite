<?php
session_start();

include("connec.php");
include("func.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $userId = $_POST['id'];
  $password = $_POST['password'];

  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if(!empty($userId) && !empty($password))
  {
    $query = "select * from userdetails where userId= '$userId'limit 1";

    $result  = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
      $userData = mysqli_fetch_assoc($result);

      if($userData['password'] == $password)
      {
        $_SESSION['userId'] = $userData['userId'];
        header("Location: home.php");
        die;
      }
      echo "Incorrect password! Try again.";
       
    }
    else
    {
      echo "userId doesn't exist! Sign Up first!";
    }
  }
  else
  {
    echo "Incorret userId or password, check again!";
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
            <h1>Log In</h1><hr><br>
            <form class="form" id="bLogin" method="post">
              <h2>User id:</h2>
              <input type="number" class="input_box" name="id" placeholder="Enter your User id" required>
              <br><br>
              <h2>Password:</h2>
              <input type="password" class="input_box" name="password" placeholder="Enter your password" required>
              <br><br><button type="submit" name="submit-btn">Submit</button>
              <br><br><a href="signup.php"><button type="button" name="new-btn">I'm new here!</button></a>
            </form>
          </div>
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