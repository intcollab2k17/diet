<?php 

include('session.php');
	
	$question = $_POST['question'];
	
	$result = mysqli_query($con,"SELECT * FROM question where question='$question'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO question(question) 
				VALUES('$question')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new question!');</script>";
				echo "<script>document.location='questions.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Question already added!');</script>";
				echo "<script>document.location='questions.php'</script>";  
		}
	
?>