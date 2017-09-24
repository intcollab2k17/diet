<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Diet Monitoring System</title>

    <?php include('css.php');?>
    <style tyle="text/css">
     @media print
     {
        #print {display: none;}
     }
     
  </style>
   

</head>

<body>

    <div id="wrapper">

        <?php include('nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                    <h4 style="text-align: center;">RDA Happy Fit Club <br>Circumferential Road, Carlos Hilado Highway, Brgy. Bata <br>09267486448/09212812057</h4>
                   <h3 class="page-header" style="text-align: center;">Program Involvement By Age Bracket</h3>
                </div>
                <div class="col-md-12" style="text-align: right">
                    <button onclick="window.print()" class="btn btn-success" id="print">Print</button>
                  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>10-20</th>
                                        <th>21-30</th>
                                        <th>31-40</th>
                                        <th>41-50</th>
                                        <th>51-60</th>
                                        <th>61-70</th>
                                        <th>71-80</th>
                                    </tr>
<?php
   $query=mysqli_query($con,"select * from program")or die(mysqli_error($con));   
            while ($row=mysqli_fetch_array($query)){
                $pid=$row['program_id'];   
?>                                       
                                    <tr>
                                        <th><?php echo $row['program_name'];?></th>
                                       
                                        <th>
<?php 
$query1=mysqli_query($con,"select * from monitoring natural join taker where (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365) >=10 and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365)<=20 and program_id='$pid'")or die(mysqli_error($con));   
    echo  mysqli_num_rows($query1);
?>
                                        </th>
                                        <th>
<?php 
$query2=mysqli_query($con,"select * from monitoring natural join taker where (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365) >=21 and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365)<=30 and program_id='$pid'")or die(mysqli_error($con));   
    echo  mysqli_num_rows($query2);
?>                                            
                                        </th>
                                        <th>
<?php 
$query3=mysqli_query($con,"select * from monitoring natural join taker where (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365) >=31 and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365)<=40 and program_id='$pid'")or die(mysqli_error($con));   
    echo  mysqli_num_rows($query3);
?>                                            
                                        </th>
                                        <th>
<?php 
$query4=mysqli_query($con,"select * from monitoring natural join taker where (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365) >=41 and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365)<=50 and program_id='$pid'")or die(mysqli_error($con));   
    echo  mysqli_num_rows($query4);
?>                                            
                                        </th>
                                        <th>
<?php 
$query5=mysqli_query($con,"select * from monitoring natural join taker where (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365) >=51 and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365)<=60 and program_id='$pid'")or die(mysqli_error($con));   
    echo  mysqli_num_rows($query5);
?>                                            
                                        </th>
                                        <th>
<?php 
$query6=mysqli_query($con,"select * from monitoring natural join taker where (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365) >=61 and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365)<=70 and program_id='$pid'")or die(mysqli_error($con));   
    echo  mysqli_num_rows($query6);
?>                                            
                                        </th>
                                        <th>
<?php 
$query7=mysqli_query($con,"select * from monitoring natural join taker where (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365) >=71 and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(bday, '%Y-%m-%d'))/365)<=80 and program_id='$pid'")or die(mysqli_error($con));   
    echo  mysqli_num_rows($query7);
?>                                            
                                        </th>
                                    </tr>
<?php }?>                                
<?php

        $query8=mysqli_query($con,"select * from monitoring natural join taker ")or die(mysqli_error($con));
            $i=1;
        //  while ($row=mysqli_fetch_array($query)){
            $id=$row['prod_id'];
?>                                     
                                </thead>
                                <tbody>
                                  
                                    
                                   
                                </tbody>
                            </table>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="product_add.php">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <input class="form-control" type="text" name="product" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Vol Pts</label>
                                                            <input class="form-control" type="text" name="pts" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Retail Price</label>
                                                            <input class="form-control" type="text" name="price" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select class="form-control" name="cat">
<?php

    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php } ?> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input class="form-control" type="number" name="qty" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Reorder</label>
                                                            <input class="form-control" type="number" name="reorder" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> C </label>
                                                            <input class="form-control" type="text" name="c" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="pc" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> SC </label>
                                                            <input class="form-control" type="text" name="sc" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psc" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> SB </label>
                                                            <input class="form-control" type="text" name="sb" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psb" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> supv </label>
                                                            <input class="form-control" type="text" name="supv" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psupv" required>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info">Save changes</button>
                                        </div>
                                            </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
