<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $supplement = $_POST['supplement'];
	 $sup_count = $_POST['sup_count'];
	 
	 $result = mysqli_query($con,"SELECT * FROM supplement where prod_id='$supplement'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
	 		mysqli_query($con,"UPDATE supplement SET prod_id='$supplement', sup_count='$sup_count' where sup_id='$id'")or die(mysqli_error($con));
	 		echo "<script type='text/javascript'>alert('Successfully updated supplement!');</script>";
			echo "<script>document.location='supplements.php'</script>";
	 	} 
	 	else
	 	{
	 		echo "<script type='text/javascript'>alert('Supplement already in the list!');</script>";
			echo "<script>document.location='supplements.php'</script>";
	 	}
} 

