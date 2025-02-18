<?php
require("connection.php");
$userId = $_REQUEST["userId"];
$newpassword = $_REQUEST["newpassword"];
$confirmpassword = $_REQUEST["confirmpassword"];

$res=$con->query("UPDATE `user_details` 
          SET `Password`='$newpassword',`Confirm Password`='$confirmpassword'
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
