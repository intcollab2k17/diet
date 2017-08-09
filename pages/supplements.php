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
                    <h1 class="page-header">Daily Dietary Supplement</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Add Dietary Supplement</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Count</th>
                                        <th>Supplement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

        $query=mysqli_query($con,"select * from supplement natural join product")or die(mysqli_error($con));
            $i=1;
          while ($row=mysqli_fetch_array($query)){
            $id=$row['sup_id'];
            $pid=$row['prod_id'];
            $sup_count=$row['sup_count'];
?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $i;?></td>
                                        <td><?php echo $row['sup_count'];?></td>
                                        <td><?php echo $row['prod_name'];?></td>
                                        <td>
                                            <a href="" class="btn btn-info btn-circle" data-toggle="modal" data-target="#edit<?php echo $id;?>"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Wellness Program</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="supplement_edit.php">
                                                <input type="hidden" name="id" value="<?php echo $row['sup_id'];?>">
                                                <div class="form-group">
                                                    <label>Supplement Name</label>
                                                    <select class="form-control" name="supplement">
                                                         <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
<?php 

    $result = mysqli_query($con,"SELECT * FROM product where prod_id<>'$pid' ORDER BY prod_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
<?php } ?> 
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Count</label>
                                                <input class="form-control" type="number" name="sup_count" value="<?php echo $sup_count;?>" required>
                                                </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info" name="edit">Save changes</button>
                                        </div>
                                            </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->                                    
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
                                            <h4 class="modal-title" id="myModalLabel">Add New Wellness Program</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="supplement_add.php">
                                                <div class="form-group">
                                                    <label>Supplement</label>
                                                    <select class="form-control" name="supplement">
<?php 

    $result = mysqli_query($con,"SELECT * FROM product ORDER BY prod_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
<?php } ?> 
                                                            </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Count</label>
                                                <input class="form-control" type="number" name="sup_count" required>
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
