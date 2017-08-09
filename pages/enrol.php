<?php 

include('session.php');
	
	$program = $_POST['program'];
	$id = $_POST['id'];
	$mid = $_POST['mid'];
	
		mysqli_query($con,"UPDATE monitoring SET monitor_status='Finished' where monitor_id='$mid'")
	 or die(mysqli_error($con)); 

	
	$query = mysqli_query($con,"SELECT * FROM monitoring where id='$id' and monitor_status<>'Finished'"); 
        $count = mysqli_num_rows($query);

        if ($count==0)
        {
        	mysqli_query($con,"INSERT INTO monitoring(id,program_id) 
				VALUES('$id','$program')")or die(mysqli_error($con));  
			$mid=mysqli_insert_id($con);	

		    $result = mysqli_query($con,"SELECT * FROM supplement")or die(mysqli_error($con));  
		        while($r = mysqli_fetch_array($result))
		        {
		        	$prod_id = $r['prod_id'];	
			    	$count = $r['sup_count'];

			    	mysqli_query($con,"INSERT INTO sup_taker(monitor_id,prod_id,count) 
						VALUES('$mid','$prod_id','$count')")or die(mysqli_error($con));  
		        }
		        
		        $meal = $_POST['meal'];

		        foreach($meal as $m)
		        {
		        	mysqli_query($con,"INSERT INTO taker_meal(meal_id,taker_id) 
						VALUES('$m','$id')")or die(mysqli_error($con));  	
		        }

				echo "<script type='text/javascript'>alert('Successfully enrolled taker in a wellness program!');</script>";
				echo "<script>document.location='existing.php'</script>";   
        }
        else
         {
        		echo "<script type='text/javascript'>alert('Taker has unfinished diet program yet!');</script>";
				echo "<script>document.location='existing.php'</script>";   
        }		

	
	
?>