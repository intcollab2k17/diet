<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $question = $_POST['question'];
	 
	 mysqli_query($con,"UPDATE question SET question='$question' where question_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated question details!');</script>";
		echo "<script>document.location='questions.php'</script>";
	
} 

