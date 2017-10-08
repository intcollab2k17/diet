<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $time = $_POST['time'];
	 $meal = $_POST['meal'];
	 $cal = $_POST['cal'];
	 
	 mysqli_query($con,"UPDATE meal SET meal_time='$time',meal='$meal',calories='$cal' where meal_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated meal details!');</script>";
		echo "<script>document.location='meal.php'</script>";
	
} 

