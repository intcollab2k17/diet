<?php 

include('session.php');
			$id = $_POST['id'];
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
			$height = $_POST['height'];
			$weight = $_POST['weight'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
	
			$bmi=($weight/$height)/$height;
			if ($bmi<18.5)
			{
				$remarks="underweight";
			}
			if (($bmi>=18.5) and ($bmi<25))
			{
				$remarks="normal";
			}
			if (($bmi>=25) and ($bmi<30))
			{
				$remarks="overweight";
			}
			if ($bmi>=30)
			{
				$remarks="obese";
			}

			$query=mysqli_query($con,"select * from bfi where gender='$gender' and age_start<='$age' and age_end>='$age' and fat_start<='$fat' and fat_end>='$fat'")or die(mysqli_error($con));
          		$row=mysqli_fetch_array($query);
            		$status=$row['bfi_status'];

            mysqli_query($con,"UPDATE initial_result set id='$id',ir_fat='$fat',ir_visceral='$visceral',ir_bonemass='$bone_mass',ir_restingmr='$rmr',ir_metabolic_age='$m_age',ir_muscle_mass='$muscle_mass',ir_physique_rating='$p_rating',ir_water='$water',ir_ideal_weight='$ideal_weight',ir_excess_fat='$excess_fat',ir_ideal_visceral='$ideal_visceral',bfi='$status'") or die(mysqli_error($con));  


			echo "<script type='text/javascript'>alert('Successfully updated takers wellness record!');</script>";
			echo "<script>document.location='existing.php'</script>";   
	
?>