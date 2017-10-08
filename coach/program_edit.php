<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $program = $_POST['program'];
	 
	 mysqli_query($con,"UPDATE program SET program_name='$program' where program_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated program details!');</script>";
		echo "<script>document.location='programs.php'</script>";
	
} 

?>