<?php
include('session.php');

 if (isset($_POST['edit']))
 { 
	 $id = $_POST['id'];
	 $product = $_POST['product'];
		$pts = $_POST['pts'];
		$c = $_POST['c'];
		$pc = $_POST['pc'];
		$sc = $_POST['sc'];
		$psc = $_POST['psc'];
		$sb = $_POST['sb'];
		$psb = $_POST['psb'];
		$supv = $_POST['supv'];
		$psupv = $_POST['psupv'];
		$price = $_POST['price'];
		$cat = $_POST['cat'];
		//$qty = $_POST['qty'];
		$reorder = $_POST['reorder'];
	 
	 mysqli_query($con,"UPDATE product SET prod_name='$product',vol_pts='$pts',c='$c',sc='$sc',sb='$sb',supv='$supv',profitc='$pc',profitsc='$psc',profitsb='$psb',profitsupv='$psupv',retail='$price',reorder='$reorder',cat_id='$cat' where prod_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
		echo "<script>document.location='products.php'</script>";
	
} 

