<?php 

include('session.php');
	
	$program = $_POST['program'];
	
	$result = mysqli_query($con,"SELECT * FROM program where program_name='$program'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO program(program_name) 
				VALUES('$program')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new program!');</script>";
				echo "<script>document.location='programs.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Program already added!');</script>";
				echo "<script>document.location='programs.php'</script>";  
		}
	
?>