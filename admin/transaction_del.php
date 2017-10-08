<?php include('session.php');

$id = $_REQUEST['id'];

$result=mysqli_query($con,"DELETE FROM temp_trans WHERE temp_trans_id ='$id'")
	or die(mysqli_error($con));
	
echo "<script>document.location='transaction.php'</script>";  
?>