<?php 

include('session.php');
	
	$gender = $_POST['gender'];
	$age_start = $_POST['age_start'];
	$age_end = $_POST['age_end'];
	$fat_start = $_POST['fat_start'];
	$fat_end = $_POST['fat_end'];
	$status = $_POST['status'];
	
			mysqli_query($con,"INSERT INTO bfi(gender,age_start,age_end,fat_start,fat_end,bfi_status) 
				VALUES('$gender','$age_start','$age_end','$fat_start','$fat_end','$status')")or die(mysqli_error($con));  

				echo "<script type='text/javascript'>alert('Successfully added new BFI!');</script>";
				echo "<script>document.location='bfi.php'</script>";   
	
?>