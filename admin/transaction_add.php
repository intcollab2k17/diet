<?php include('session.php');

	$prod = $_POST['prod'];
	$qty = $_POST['qty'];
		
	$query=mysqli_query($con,"select vol_pts from product where prod_id='$prod'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
			$pts=$row['vol_pts']*$qty;
			
			mysqli_query($con,"INSERT INTO temp_trans(prod_id,prod_qty,points) VALUES('$prod','$qty','$pts')")or die(mysqli_error($con));
		
			echo "<script>document.location='transaction.php'</script>";  
	
?>