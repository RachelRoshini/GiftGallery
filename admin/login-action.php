<?php
session_start();
require("connection.php");
$u = $_REQUEST["un"];
$pass = $_REQUEST["psw"];
$res = $con->query("select * from `admin` where `username`='$u' AND `password`='$pass'");
$count = $res->num_rows;
if ($count > 0)
{
	$_SESSION["rb"]=$u;
	header("location:dashboard.php");
}
else
{
	echo"<script>
	alert('Invalid username or password!');
	window.location.href='index.php';
	</script>";
}
?>
