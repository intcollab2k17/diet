<?php include('session.php');

	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
	
	$taker=$_POST['taker'];
	$discount=$_POST['discount'];

	$query=mysqli_query($con,"select * from temp_trans")or die(mysqli_error($con));
		$total=0;
		while ($row=mysqli_fetch_array($query))
		{
			$pid=$row['prod_id'];	
 			$qty=$row['prod_qty'];
			$pts=$row['points'];
			
			mysqli_query($con,"INSERT INTO stockout(prod_id,stockout_qty,stockout_date,id) VALUES('$pid','$qty','$date','$taker')")or die(mysqli_error($con));

			mysqli_query($con,"UPDATE product SET qty=qty-'$qty' where prod_id='$pid'") or die(mysqli_error($con)); 

			$total=$total+$pts;
		}
		
				mysqli_query($con,"UPDATE taker SET points=points+'$total',discount='$discount' where id='$taker'") or die(mysqli_error($con)); 
		
				$result=mysqli_query($con,"DELETE FROM temp_trans")	or die(mysqli_error($con));
				
				echo "<script>document.location='transaction.php'</script>";  
		
?>