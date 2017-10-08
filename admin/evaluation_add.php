<?php 

include('session.php');

			$mid=$_REQUEST['mid'];
			$id=$_REQUEST['id'];
			$weight = $_POST['weight'];
			$fat = $_POST['fat'];
			$visceral = $_POST['visceral'];
			$bone_mass = $_POST['bone_mass'];
			$rmr = $_POST['rmr'];
			$m_age = $_POST['m_age'];
			$muscle_mass = $_POST['muscle_mass'];
			$p_rating = $_POST['pr'];
			$water = $_POST['water'];
			$remarks = $_POST['remarks'];
			$date=date("Y-m-d");

	        $query=mysqli_query($con,"select * from result where monitor_id='$mid'")or die(mysqli_error($con));
	          	$count=mysqli_num_rows($query);

	          	$query1=mysqli_query($con,"select * from result where monitor_id='$mid' and weighin_date='$date'")or die(mysqli_error($con));
	          	
	          	$count1=mysqli_num_rows($query1);
	          	if ($count1>0)
	          	{
	          		echo "<script type='text/javascript'>alert('Evaluation already added for this day!');</script>";
					echo "<script>document.location='monitoring.php?mid=$mid&id=$id'</script>";
	          	}
	          	else
	          	{        		
	          	if ($count<10)
	          	{
	        		mysqli_query($con,"INSERT INTO result(monitor_id,weighin_date,weight,fat,visceral,bone_mass,rmr,metabolic_age,muscle_mass,physique_rating,water,remarks) 
				VALUES('$mid','$date','$weight','$fat','$visceral','$bone_mass','$rmr','$m_age','$muscle_mass','$p_rating','$water','$remarks')")or die(mysqli_error($con));  

				echo "<script type='text/javascript'>alert('Successfully added new evaluation for taker!');</script>";
				echo "<script>document.location='monitoring.php?mid=$mid&id=$id'</script>";     		
	          	}
				
				else
				{
					mysqli_query($con,"UPDATE monitoring SET monitor_status='Finished' where monitor_id='$mid'")or die(mysqli_error($con)); 
					echo "<script type='text/javascript'>alert('Taker already reached the 10 days program!');</script>";
					echo "<script>document.location='monitoring.php?mid=$mid&id=$id'</script>";   
				}
		}
?>