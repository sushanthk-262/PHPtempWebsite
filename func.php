<?php

function checkLogin($con){
	if(isset($_SESSION['userId']))
	{
		$id = $_SESSION['userId'];
		$query = "select * from userdetails where userId = '$id' limit 1";

		 $result = mysqli_query($con, $query);

		 if($result && mysqli_num_rows($result) > 0)
		 {
		 	$userData = mysqli_fetch_assoc($result);
		 	return $userData;
		 }
	}

	header("Location: login.php");
	die();
}

?>