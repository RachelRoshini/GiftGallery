<?php
require("connection.php");
$id=$_REQUEST["id"];
$name=$_REQUEST["name"];
$price=$_REQUEST["price"];
$quantity=$_REQUEST["quantity"];
$category=$_REQUEST["category"];
if(empty($_FILES["image"]["name"]))
{
	$res=$con->query("UPDATE `add_product` 
	SET `Product Name`='$name',`Product Price`='$price',`Product Quantity`='$quantity',`Product Category`='$category' 
	WHERE `Product Id`='$id'");
	$count=mysqli_affected_rows($con);
}
else
{
    $image=$_FILES["image"]["name"];
	$res=$con->query("UPDATE `add_product` 
	SET `Product Name`='$name',`Product Price`='$price',`Product Quantity`='$quantity',`Product Category`='$category',`Product Image`='$image'
	WHERE `Product Id`='$id'");
	$count=mysqli_affected_rows($con);
	move_uploaded_file($_FILES["image"]["tmp_name"],"imagesdb/".$image);
}
header("location:dashboard.php");
?>