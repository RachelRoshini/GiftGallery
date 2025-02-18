<?php
require("connection.php");
$userId = $_REQUEST["del"];
$status=2;

$res=$con->query("UPDATE `user_product` 
          SET `Status`='$status'
          WHERE `Id`='$userId'");
		 $count=mysqli_affected_rows($con);
		header("location:join1.php");
		
   

?>
