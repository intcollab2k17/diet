<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $cat = $_POST['cat'];
	 
	 mysqli_query($con,"UPDATE category SET cat_name='$cat' where cat_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated category details!');</script>";
		echo "<script>document.location='category.php'</script>";
	
} 

