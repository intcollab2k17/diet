<?php include('session.php');

	date_default_timezone_set("Asia/Manila"); 

	$qty=$_POST['qty'];
	$id=$_POST['id'];
	$i=0;
	foreach ($id as $id1)
	{
			mysqli_query($con,"UPDATE sup_taker SET count=count-'$qty[$i]' where sup_taker='$id1'") or die(mysqli_error($con)); 
			$i++;
	}

		
		

			echo "<script>document.location='existing.php'</script>";  
		
?>