<?php
require("connection.php");
$userId = $_REQUEST["userId"];
$username = $_REQUEST["username"];
$number = $_REQUEST["number"];
$email = $_REQUEST["email"];
$state = $_REQUEST["state"];
$country = $_REQUEST["country"];
$res=$con->query("UPDATE `user_details` 
          SET `Name`='$username', `Number`='$number', `Email`='$email', `State`='$state', `Country`='$country'
          WHERE `Id`='$userId'");
		 $count=mysqli_affected_rows($con);
		
		  if ($res)
          {
		header("location:index1.php");
		 exit();  
} else {
	header("location:login.php");
	exit();
}
		 
?>
