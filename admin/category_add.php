<?php 

include('session.php');
	
	$cat = $_POST['cat'];
	
	$result = mysqli_query($con,"SELECT * FROM category where cat_name='$cat'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO category(cat_name) 
				VALUES('$cat')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
				echo "<script>document.location='category.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Category already added!');</script>";
				echo "<script>document.location='category.php'</script>";  
		}
	
?>