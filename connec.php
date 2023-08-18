<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "myDb";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
	die("Coudn't connect to the db!");
}

?>