<?php
$con=mysqli_connect("localhost","root","","db_project");
$name=$_REQUEST["name"];
$number=$_REQUEST["number"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$confirm_password=$_REQUEST["confirm_password"];
$state=$_REQUEST["state"];
$country=$_REQUEST["country"];
$res=$con->query("INSERT INTO `user_details`(`Name`,`Number`,`Email`,`Password`,`Confirm Password`,`State`,`Country`)
VALUES('$name','$number','$email','$password','$confirm_password','$state','$country')");
$count=mysqli_affected_rows($con);
header("location:login.php");
?>