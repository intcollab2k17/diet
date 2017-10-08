<?php 

include('session.php');
	
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$result = mysqli_query($con,"SELECT * FROM admin where username='$username'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO admin(name,username,password) 
				VALUES('$name','$username','$password')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
				echo "<script>document.location='user.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Username already exist!');</script>";
				echo "<script>document.location='user.php'</script>";  
		}
	
?>