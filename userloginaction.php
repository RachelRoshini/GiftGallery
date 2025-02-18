<?php
session_start();
require("connection.php");
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$res = $con->query("select * from `user_details` where `Name`='$username' AND `Password`='$password' ");
$count = $res->num_rows;
if ($count > 0)
{
	    $row=$res->fetch_assoc();
		$userId=$row['Id'];
		$_SESSION["br"]=$userId;
		
		 $_SESSION["rb"]=$username;
		header("location:index1.php");
}
else
{
	echo "<script>
	alert('Invalid username or password!');
	window.location.href='login.php';
	</script>";
}
?>
