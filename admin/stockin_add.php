<?php include('session.php');

	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
	$qty=$_POST['qty'];
	$pid=$_POST['prod'];

			mysqli_query($con,"INSERT INTO stockin(prod_id,stockin_qty,stockin_date) VALUES('$pid','$qty','$date')")or die(mysqli_error($con));

			mysqli_query($con,"UPDATE product SET qty=qty+'$qty' where prod_id='$pid'") or die(mysqli_error($con)); 

			echo "<script>document.location='stockin.php'</script>";  
		
?>