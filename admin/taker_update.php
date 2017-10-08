<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $last = $_POST['last'];
	 $first = $_POST['first'];
	 $bday = $_POST['bday'];
	 $status = $_POST['status'];
	 
	 mysqli_query($con,"UPDATE taker SET last='$last',first='$first',bday='$bday',status='$status' where id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated taker details!');</script>";
		echo "<script>document.location='existing.php'</script>";
	
} 

