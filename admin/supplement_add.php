<?php 

include('session.php');
	
	$supplement = $_POST['supplement'];
	$sup_count = $_POST['sup_count'];
	
	$result = mysqli_query($con,"SELECT * FROM supplement where prod_id='$supplement'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO supplement(prod_id,sup_count) 
				VALUES('$supplement','$sup_count')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new supplement!');</script>";
				echo "<script>document.location='supplements.php'</script>";   
		}
		elseif ($count==3)
        {
        		echo "<script type='text/javascript'>alert('Supplement already reached 3!');</script>";
				echo "<script>document.location='supplements.php'</script>";   
        }	
		else
		{	
				echo "<script type='text/javascript'>alert('Supplement already added!');</script>";
				echo "<script>document.location='supplements.php'</script>";  
		}
	
?>