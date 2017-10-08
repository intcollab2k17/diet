<?php 

include('session.php');
	
	$product = $_POST['product'];
	$pts = $_POST['pts'];
	$c = $_POST['c'];
	$pc = $_POST['pc'];
	$sc = $_POST['sc'];
	$psc = $_POST['psc'];
	$sb = $_POST['sb'];
	$psb = $_POST['psb'];
	$supv = $_POST['supv'];
	$psupv = $_POST['psupv'];
	$price = $_POST['price'];
	$cat = $_POST['cat'];
	$qty = $_POST['qty'];
	$reorder = $_POST['reorder'];
	
	$result = mysqli_query($con,"SELECT * FROM product where prod_name='$product'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO product(prod_name,vol_pts,c,sc,sb,supv,retail,profitc,profitsc,profitsb,profitsupv,qty,reorder,cat_id) 
				VALUES('$product','$pts','$c','$sc','$sb','$supv','$price','$pc','$psc','$psb','$psupv','$qty','$reorder','$cat')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new product!');</script>";
				echo "<script>document.location='products.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Product already added!');</script>";
				echo "<script>document.location='products.php'</script>";  
		}
	
?>