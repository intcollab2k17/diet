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
                    <h1 class="page-header">Daily Dietary Supplement and Meal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Daily Dietary Supplement
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form method="post" action="sup_update.php">
                            <!--row-->
                            <div class="row">
                                
<?php
        $mid=$_REQUEST['mid'];
        $query=mysqli_query($con,"select * from sup_taker natural join product natural join monitoring where monitor_id='$mid'")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){
            $id=$row['id'];
?>                               
                                <div class="col-lg-4">
                                    <div class="form-group">
                                            <label></label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="hidden" class="form-control" name="id[]" value="<?php echo $row['sup_taker'];?>">
                                                    <?php echo $row['prod_name'];?> - Remaining (<?php echo $row['count'];?>) <br>
                                                    Less <input type="number" class="form-control" name="qty[]" value="1">
                                                </label>
                                            </div>
                                        </div>
                                </div>
<?php }?>                                
                            </div><!--row-->
                            <hr>
                            <div class="row pull-right">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-lg btn-info">Save changes</button>
                                    <button type="reset" class="btn btn-lg btn-default">Clear</button>
                                </div>
                            </div><br><br><br>
                            </form>
                            <!--row-->
                            <div class="row">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        Daily Meal
                                    </div>
                            
                                
<?php

        $query=mysqli_query($con,"select * from taker_meal natural join meal where id='$id'")or die(mysqli_error($con));
            $i=1;
          while ($row=mysqli_fetch_array($query)){
           // $id=$row['question_id'];
?>                               
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            <label></label>
                                            <div class="checkbox">
                                                <label>
                                                    <?php echo $row['meal_time']." - ".$row['meal'];?>
                                                </label>
                                            </div>
                                        </div>
                                </div>
<?php }?>                                
                            </div><!--row-->
                            
                            
                            <!--row-->
                        </div>    
                        <!--panel body-->
                        
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
                                            <h4 class="modal-title" id="myModalLabel">Add New Wellness Program</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="program_add.php">
                                                <div class="form-group">
                                                    <label>Program Name</label>
                                                    <input class="form-control" type="text" name="program" required>
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
