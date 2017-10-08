<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $name = $_POST['name'];
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 
	 mysqli_query($con,"UPDATE admin SET name='$name',username='$username',password='$password' where admin_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated coach details!');</script>";
		echo "<script>document.location='coach.php'</script>";
	
} 

