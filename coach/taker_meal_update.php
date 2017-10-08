<?php 

include('session.php');
	
	$meal = $_POST['meal'];
	$id = $_POST['id'];
	
		
		mysqli_query($con,"DELETE FROM taker_meal WHERE id ='$id'")or die(mysqli_error($con));

		foreach ($meal as $value) {
			mysqli_query($con,"INSERT INTO taker_meal(id,meal_id) 
				VALUES('$id','$value')")or die(mysqli_error($con));  
		}
				echo "<script type='text/javascript'>alert('Successfully updated taker's meal !');</script>";
				echo "<script>document.location='existing.php'</script>";   
        
	
?>