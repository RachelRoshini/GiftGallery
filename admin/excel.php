<?php
//Database connection parameters
$host="localhost";
$username="root";
$password="";
$dbname="db_project"; //Your database name

//Create a connection
$con=new mysqli($host,$username,$password,$dbname);

//Check connection
if($con->connect_error)  {
	die("Connection failed: " . $con->connect_error);
}

//Set headers for Excel file download
$filename="MyData.xls"; // File name
header("Content-Disposition:attachment;filename=\"$filename\"");
header("Content-Type:application/vnd.ms-excel");

// Query to fetch data from the table
$sql_data="SELECT * FROM `add_product`"; // Your table name
$result_data=$con->query($sql_data);

//Check if there are results
if ($result_data && $result_data->num_rows > 0) {
	$flag=false;
	while($row=$result_data->fetch_assoc()) {
		if(!$flag) {
			//Display field/column names as the first row
			echo implode("\t",array_keys($row)) . "\r\n";
			$flag=true;
		}
		//Display data rows
		echo implode("\t",array_values($row)) . "\r\n";
	}
} else {
	echo "No data found.";
}

// Close the connection
$con->close();
?>




