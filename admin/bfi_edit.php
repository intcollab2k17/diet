<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $gender = $_POST['gender'];
	$age_start = $_POST['age_start'];
	$age_end = $_POST['age_end'];
	$fat_start = $_POST['fat_start'];
	$fat_end = $_POST['fat_end'];
	$status = $_POST['status'];
	 
	 mysqli_query($con,"UPDATE bfi SET gender='$gender',age_start='$age_start',age_end='$age_end',fat_start='$fat_start',fat_end='$fat_end',bfi_status='$status' where bfi_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated bfi details!');</script>";
		echo "<script>document.location='bfi.php'</script>";
	
} 

