<?php 

include('session.php');
	
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
			mysqli_query($con,"INSERT INTO admin(name,username,password,type) 
				VALUES('$name','$username','$password','coach')")or die(mysqli_error($con));  
				echo "<script type='text/javascript'>alert('Successfully added new coach!');</script>";
				echo "<script>document.location='coach.php'</script>";   
	
	
?>