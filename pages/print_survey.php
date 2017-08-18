<?php include('session.php');?>
<html>
	<head>
		<title>Diet Monitoring</title>
		<style type="text/css">
			.border td{
				border: 1px solid #000;
			}
			table{
				border-collapse: collapse;
			}
		</style>
	</head>
	<body>
<?php
		$irid=$_REQUEST['irid'];
        $query=mysqli_query($con,"select * from initial_result natural join taker where ir_id='$irid'")or die(mysqli_error($con));
          $row=mysqli_fetch_array($query);
            $id=$row['id'];
            $age = date_create($row['bday'])->diff(date_create('today'))->y;
?>   	
		<table style="width: 100% ">
			<tr>
				<td colspan="4">Name: <?php echo $row['first']." ".$row['last'];?></td>
				<td colspan="2">Age: <?php echo $age;?></td>
				<td colspan="2">Height: <?php echo $row['ir_height'];?></td>
			</tr>
			<tr style="text-align: center;">
				<td colspan="8"><h3>WELLNESS EVALUATION RESULTS</h3></td>
			</tr>
			<tr class="border">
				<td>Date</td>
				<td>Fat %</td>
				<td>Visceral Fat</td>
				<td>Bone Mass</td>
				<td>Resting Metabolic Rate</td>
				<td>Metabolic Age</td>
				<td>Muscle Mass</td>
				<td>Physique Rating</td>
				<td>Water %</td>
			</tr>
			<tr class="border">
				<td><?php echo date("M d, Y", strtotime($row['ir_date']));?></td>
				<td><?php echo $row['ir_fat'];?></td>
				<td><?php echo $row['ir_visceral'];?></td>
				<td><?php echo $row['ir_bonemass'];?></td>
				<td><?php echo $row['ir_restingmr'];?></td>
				<td><?php echo $row['ir_metabolic_age'];?></td>
				<td><?php echo $row['ir_muscle_mass'];?></td>
				<td><?php echo $row['ir_physique_rating'];?></td>
				<td><?php echo $row['ir_water'];?></td>
			</tr>
			<tr class="border">
				<td colspan="6"></td>
				<td>Present Weight</td>
				<td>Ideal Weight</td>
				<td>Ideal Visceral</td>
			</tr>
			<tr class="border">
				<td colspan="6"></td>
				<td><?php echo $row['ir_weight'];?></td>
				<td><?php echo $row['ir_ideal_weight'];?></td>
				<td><?php echo $row['ir_ideal_visceral'];?></td>
			</tr>
		</table>		<img src="../dist/img/body_index.jpg" style="width: 50%">
	</body>
</html>