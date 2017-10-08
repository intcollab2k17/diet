<?php 

include('session.php');
	
	$time = $_POST['time'];
	$meal = $_POST['meal'];
	$cal = $_POST['cal'];
	
	$result = mysqli_query($con,"SELECT * FROM meal where meal='$meal'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO meal(meal_time,meal,calories) 
				VALUES('$time','$meal','$cal')")or die(mysqli_error());  

				echo "<script type='text/javascript'>alert('Successfully added new meal!');</script>";
				echo "<script>document.location='meal.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Meal already added!');</script>";
				echo "<script>document.location='meal.php'</script>";  
		}
	
?>