<?php include('session.php');

include('../dist/includes/dbcon.php');
$from = $_POST['from'];
$to = $_POST['to'];
$time = $_POST['time'];
$event = $_POST['event'];
$allday = $_POST['allday'];
$id = $_POST['id'];
 
 if (isset($_POST['update']))
 { 
  $id = $_POST['id'];
  mysqli_query($con,"UPDATE schedule SET sched_event='$event',sched_from='$from',sched_to='$to',sched_time='$time',sched_allday='$allday' where sched_id='$id'") or die(mysqli_error()); 
  echo "<script type='text/javascript'>alert('Successfully updated schedule!');</script>";
 } 
  
  echo "<script>document.location='calendar.php'</script>";
