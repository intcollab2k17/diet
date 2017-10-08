<?php include('session.php');
error_reporting(0);
	$event = $_POST['event'];
	$start = $_POST['start'];
	$end=$_POST['end'];
	$time=$_POST['time'];
	$allday=$_POST['allday'];
			
				mysqli_query($con,"INSERT INTO schedule(sched_event,sched_from,sched_to,sched_time,sched_allday) VALUES('$event','$start','$end','$time','$allday')")or die(mysqli_error());

					  echo "<script type='text/javascript'>alert('Successfully added new schedule!');</script>";
					  echo "<script>document.location='calendar.php'</script>";  
	
?>