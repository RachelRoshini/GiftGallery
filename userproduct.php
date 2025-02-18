
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link href="admin/css/style.css" rel="stylesheet" type="text/css">
    <link href="admin/css/style-responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="admin/css/font.css" type="text/css">
    <link href="admin/css/font-awesome.css" rel="stylesheet"> 
    <script src="admin/js/jquery2.0.3.min.js"></script>
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
        function hideURLbar() { window.scrollTo(0,1); }
    </script>
</head>
<body>
    <header class="panel-heading">
        BUY NOW - Product
    </header>
    <div class="panel-body">
        <div class="position-center">
          <?php
		   	$con=mysqli_connect("localhost","root","","db_project");
			$id=$_REQUEST["var"];
			$res=$con->query("SELECT * FROM `add_product` WHERE `Product Id`='$id'");
			$count=$res->num_rows;
			if($count>0)
			  {
				$row=$res->fetch_assoc();
			  }
			$imagepath='admin/imagesdb/'.$row["Product Image"];
		 ?>
            <div class="container-fluid">  
                <div class="row">
                    <div class="col-md-6" style="margin-top:120px;">
					<img src="<?php echo htmlspecialchars($imagepath);?>">
                    </div>
                    <div class="col-md-6">
                        <form role="form" action="submit.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $row["Product Id"];?>" name="id">
                            <div class="form-group">
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["Product Name"]; ?>" required>
                            </div>
							 <div class="form-group">
                                <label for="category">Product Category:</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="Kids" <?php if ($row["Product Category"] == "Kids") echo "selected"; ?>>Kids</option>
                                    <option value="Women" <?php if ($row["Product Category"] == "Women") echo "selected"; ?>>Women</option>
                                    <option value="Men" <?php if ($row["Product Category"] == "Men") echo "selected"; ?>>Men</option>
                                    <option value="Gifts" <?php if ($row["Product Category"] == "Gifts") echo "selected"; ?>>Gifts</option>
                                    <option value="Customized Gifts" <?php if ($row["Product Category"] == "Customized Gifts") echo "selected"; ?>>Customized Gifts</option>
                                    <option value="Unique Gifts" <?php if ($row["Product Category"] == "Unique Gifts") echo "selected"; ?>>Unique Gifts</option>
                                </select>
                            </div>
							 <div class="form-group">
					         <input type="hidden" class="form-control" id="imagename" name="imagename" value="<?php echo $row["Product Image"];?>">
                             </div> 
							<div class="form-group">
                                <label for="price">Product Price:</label>
                                <input type="number" class="form-control" id="price" name="price" value="<?php echo $row["Product Price"]; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Product Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row["Product Quantity"]; ?>" required>
                            </div>
							<div class="form-group">
                            <label for="total">Total Amount:</label>
                            <input type="text" class="form-control" id="total" name="total" value="<?php echo $row['Product Price'] * $row['Product Quantity']; ?>" readonly>
                            </div><br>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin/js/bootstrap.js"></script>
    <script src="admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="admin/js/scripts.js"></script>
    <script src="admin/js/jquery.slimscroll.js"></script>
    <script src="admin/js/jquery.nicescroll.js"></script>
    <script src="admin/js/jquery.scrollTo.js"></script>
	<script>
    const priceInput = document.getElementById('price');
    const quantityInput = document.getElementById('quantity');
    const totalInput = document.getElementById('total');
        function updateTotal() {
        const price = parseFloat(priceInput.value) || 0; 
        const quantity = parseInt(quantityInput.value) || 0; 
        const total = price * quantity; 
        totalInput.value = total.toFixed(2); 
    }
       quantityInput.addEventListener('input', updateTotal);
       updateTotal();
</script>
</body>
</html>
