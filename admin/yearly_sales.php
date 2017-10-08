<?php 
include('session.php');

$year=date('Y');
	$query = mysqli_query($con,"select *,SUM(stockout_qty) as amount,DATE_FORMAT(stockout_date,'%b') as month from stockout natural join product where YEAR(stockout_date)='$year' group by prod_id") or die(mysqli_error($con));

	$category = array();
	//$category['name'];

	$series1 = array();
	

	while($r = mysqli_fetch_array($query)) {
		
	    //$count=$r['total'];
	    $category['name'][] =$r['prod_name'];
	    $category['data'][] =$r['prod_name'];
	    $series1['data'][] = $r['amount'];
	    $series1['name'] = $r['prod_name'];

}

$result = array();
array_push($result,$category);
array_push($result,$series1);
//array_push($result,$series2);

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
//session_destroy(year);
?> 
