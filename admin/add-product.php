<?php
require("connection.php");
$name=$_REQUEST["name"];
$price=$_REQUEST["price"];
$quantity=$_REQUEST["quantity"];
$category=$_REQUEST["category"];
$image=$_FILES["image"]["name"];
$res=$con->query("INSERT INTO `add_product`(`Product Name`,`Product Price`,`Product Quantity`,`Product Category`,`Product Image`)
VALUES('$name','$price','$quantity','$category','$image')");
$count=mysqli_affected_rows($con);
move_uploaded_file($_FILES["image"]["tmp_name"],"imagesdb/".$image);
header("location:dashboard.php");
?>