<?php 

include('session.php');
	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$gender = $_POST['gender'];
	$bday = $_POST['bday'];
	$phone = $_POST['phone'];
	$height = $_POST['height'];
	$weight = $_POST['weight'];
	$referrer = $_POST['referrer'];
	$rcontact = $_POST['rcontact'];
	$question = $_POST['question'];
	

	$result = mysqli_query($con,"SELECT * FROM taker where last='$last' and first='$first' and bday='$bday'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO taker(last,first,gender,bday,phone,referrer_name,referrer_contact,status,height,orig_weight) 
				VALUES('$last','$first','$gender','$bday','$phone','$referrer','$rcontact','Active','$height','$weight')")or die(mysqli_error());  
				
			$id=mysqli_insert_id($con);	
				
			foreach ($question as $q)
			{
				mysqli_query($con,"INSERT INTO survey(id,question_id,answer) 
				VALUES('$id','$q','yes')")or die(mysqli_error($con));  
			}

			$fat = $_POST['fat'];
			$visceral = $_POST['visceral'];
			$bone_mass = $_POST['bone_mass'];
			$rmr = $_POST['rmr'];
			$m_age = $_POST['m_age'];
			$muscle_mass = $_POST['muscle_mass'];
			$p_rating = $_POST['prating'];
			$ideal_weight = $_POST['ideal_weight'];
			$water = $_POST['water'];
			$excess_fat = $_POST['excess_fat'];
			$ideal_visceral = $_POST['ideal_visceral'];
			$date=date("Y-m-d");

			mysqli_query($con,"INSERT INTO initial_result(id,ir_date,ir_fat,ir_visceral,ir_bonemass,ir_restingmr,ir_metabolic_age,ir_muscle_mass,ir_physique_rating,ir_water,ir_height,ir_weight,ir_ideal_weight,ir_excess_fat,ir_ideal_visceral) 
				VALUES('$id','$date','$fat','$visceral','$bone_mass','$rmr','$m_age','$muscle_mass','$p_rating','$water','$height','$weight','$ideal_weight','$excess_fat','$ideal_visceral')")or die(mysqli_error($con));  

				$irid=mysqli_insert_id($con);	

				echo "<script type='text/javascript'>alert('Successfully added new taker!');</script>";
				echo "<script>document.location='print_survey.php?irid=$irid'</script>";   
		}
		else
		{
				echo "<script type='text/javascript'>alert('Taker is already a member!');</script>";
				echo "<script>document.location='profiling.php'</script>";   
		}
?>