<?php
include('session.php');

	 $id = $_SESSION['id'];
	 $name = $_POST['name'];
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 
	 mysqli_query($con,"UPDATE admin SET name='$name',username='$username',password='$password' where admin_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated admin details!');</script>";
		echo "<script>document.location='settings.php'</script>";
	

