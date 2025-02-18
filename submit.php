<?php
session_start();
$con=mysqli_connect("localhost","root","","db_project");
$name=$_REQUEST["name"];
$price=$_REQUEST["price"];
$quantity=$_REQUEST["quantity"];
$category=$_REQUEST["category"];
$image=$_REQUEST["imagename"];
$totalamount=$_REQUEST["total"];
if (isset($_SESSION["br"])) {
    $userId = $_SESSION["br"];
$res=$con->query("INSERT INTO `user_product`(`Product Name`,`Product Price`,`Product Quantity`,`Product Category`,`Product Image`,`Total Amount`,`user_id`)
VALUES('$name','$price','$quantity','$category','$image','$totalamount','$userId')");
$count=mysqli_affected_rows($con);

header("location:myorder.php");
}
?>