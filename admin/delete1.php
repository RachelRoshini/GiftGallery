<?php
require("connection.php");
$id=$_REQUEST["del"];
$res=$con->query("DELETE FROM `user_details`  WHERE `Id`=$id");
$count=mysqli_affected_rows($con);
header("location:join.php");
?>