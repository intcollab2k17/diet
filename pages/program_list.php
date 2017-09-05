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
                   <h3 class="page-header" style="text-align: center;">Takers' List Per Program</h3>
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
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Gender</th>
                                        <th>Program</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
        $program_id=$_REQUEST['program_id'];

        $query=mysqli_query($con,"select * from taker natural join monitoring natural join program where monitor_status <> 'Finished' and program_id='$program_id' order by last,first")or die(mysqli_error($con));
            $i=1;
          while ($row=mysqli_fetch_array($query)){
            $id=$row['id'];

?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $i;?></td>
                                        <td><?php echo $row['last'];?></td>
                                        <td><?php echo $row['first'];?></td>
                                        <td><?php echo $row['gender'];?></td>
                                        <td><?php echo $row['program_name'];?></td>
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
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add New Category Program</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="category_add.php">
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input class="form-control" type="text" name="cat" required>
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
