<?php
//$cert_type=$_POST['cert_type'];

$country=$_POST['country'];


				  require('connection.php');
				 
				  $res=$con->query("SELECT * FROM states where country_id='$country'");
				 $count=$res->num_rows;

if($count>0){
	?>
	
	<option value="sel_state">--Select State--</option>
	<?php
	
while($row = $res->fetch_assoc())
{

?>
<option value="<?php echo $row['stat_id'];  ?>"><?php echo $row['sname']; ?></option>

             <?php
}

}


else{
	
	echo "No Results";
}
				 
				  
				  ?>
				  
