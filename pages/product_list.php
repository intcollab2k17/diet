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

   

</head>

<body>

    <div id="wrapper">

        <?php include('nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                    <h4 style="text-align: center;">RDA Happy Fit Club <br>Circumferential Road, Carlos Hilado Highway, Brgy. Bata <br>09267486448/09212812057</h4>
                   <h3 class="page-header" style="text-align: center;">Product List</h3>
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
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Vol Pts</th>
                                        <th>C</th>
                                        <th>SC</th>
                                        <th>SB</th>
                                        <th>SUPV</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

        $query=mysqli_query($con,"select * from product order by prod_name")or die(mysqli_error($con));
            $i=1;
          while ($row=mysqli_fetch_array($query)){
?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $i;?></td>
                                        <td><?php echo $row['prod_name'];?></td>
                                        <td><?php echo $row['vol_pts'];?></td>
                                        <td><?php echo $row['c'];?></td>
                                        <td><?php echo $row['sc'];?></td>
                                        <td><?php echo $row['sb'];?></td>
                                        <td><?php echo $row['supv'];?></td>
                                    </tr>
                                                            
<?php $i++;}?>                                    
                                    
                                   
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
