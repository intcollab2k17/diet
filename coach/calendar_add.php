<?php 

include('session.php');
	
	$content = $_POST['content'];
	
	
			mysqli_query($con,"INSERT INTO calendar(content) 
				VALUES('$content')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new event!');</script>";
				echo "<script>document.location='calendar.php'</script>";   
	
	
?>