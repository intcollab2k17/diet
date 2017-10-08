<?php

include('session.php');
$coach=$_SESSION['id'];
$result = mysqli_query($con,"SELECT program_name,COUNT(*) as count FROM `monitoring` natural join program where monitor_status!='Finished' and coach_id='$coach' group by program_id");
	
$rows = array();
while($r = mysqli_fetch_array($result))
{

 	$row[0] = $r[0];
 	$row[1] = $r[1];

 	array_push($rows,$row);
 }



print json_encode($rows, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>

