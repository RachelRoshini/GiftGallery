<?php
require("connection.php");
$id=$_REQUEST["del"];
$res=$con->query("DELETE FROM `add_product` WHERE `Product Id`=$id");
$count=mysqli_affected_rows($con);
header("location:dashboard.php");
?>