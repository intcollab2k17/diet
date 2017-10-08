<?php include('session.php');

	$mid=$_SESSION['mid'];
	$query = mysqli_query($con,"select weighin_date,weight from result where monitor_id='$mid' order by weighin_date") or die(mysqli_error($con));

	$category = array();
	//$category['name'];

	$series1 = array();
	$series1['name'] = 'Weight';

	while($r = mysqli_fetch_array($query)) {
		
	    //$count=$r['total'];
	    $category['name'][] =date("M d, Y",strtotime($r['weighin_date']));
	    $category['data'][] =date("M d, Y",strtotime($r['weighin_date']));
	    $series1['data'][] = $r['weight'];

}

$result = array();
array_push($result,$category);
array_push($result,$series1);
//array_push($result,$series2);

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);

?> 
