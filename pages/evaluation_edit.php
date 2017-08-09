<?php 

include('session.php');

			$rid=$_POST['rid'];
			$mid=$_POST['mid'];
			$id=$_POST['id'];
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

	        		
					mysqli_query($con,"UPDATE result SET monitor_id='$mid',weight='$weight',fat='$fat',visceral='$visceral',bone_mass='$bone_mass',rmr='$rmr',metabolic_age='$m_age',muscle_mass='$muscle_mass',physique_rating='$p_rating',water='$water',remarks='$remarks' where result_id='$rid'")or die(mysqli_error($con)); 
					echo "<script type='text/javascript'>alert('Successfully updated the result!');</script>";
					echo "<script>document.location='monitoring.php?mid=$mid&id=$id'</script>";   
		
?>