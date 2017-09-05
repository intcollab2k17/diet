<?php 
include("session.php");
$id=$_REQUEST['id'];
$result=mysqli_query($con,"DELETE FROM schedule WHERE sched_id ='$id'")
	or die(mysqli_error());

?>