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
                    <h1 class="page-header">Body Fat Index Table</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Meal </button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Gender</th>
                                        <th>Age From</th>
                                        <th>Age To</th>
                                        <th>Fat % From</th>
                                        <th>Fat % To</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

        $query=mysqli_query($con,"select * from bfi")or die(mysqli_error($con));
            $i=1;
          while ($row=mysqli_fetch_array($query)){
            $id=$row['bfi_id'];
?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $row['gender'];?></td>
                                        <td><?php echo $row['age_start'];?></td>
                                        <td><?php echo $row['age_end'];?></td>
                                        <td><?php echo $row['fat_start'];?></td>
                                        <td><?php echo $row['fat_end'];?></td>
                                        <td><?php echo $row['bfi_status'];?></td>
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
                                            <h4 class="modal-title" id="myModalLabel">Edit BFI</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="bfi_edit.php">
                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender">
                                                            <option><?php echo $row['gender'];?></option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Age From</label>
                                                    <input class="form-control" type="number" name="age_start" value="<?php echo $row['age_start'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Age To</label>
                                                    <input class="form-control" type="number" name="age_end" value="<?php echo $row['age_end'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fat % From</label>
                                                    <input class="form-control" type="text" name="fat_start" value="<?php echo $row['fat_start'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fat % To</label>
                                                    <input class="form-control" type="text" name="fat_end" value="<?php echo $row['fat_end'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                            <option><?php echo $row['bfi_status'];?></option>
                                                            <option>Bad</option>
                                                            <option>Medium</option>
                                                            <option>Good</option>
                                                            <option>Excellent</option>
                                                            </select>
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
                                            <h4 class="modal-title" id="myModalLabel">Add Meal</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="bfi_add.php">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                            </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Age From</label>
                                                    <input class="form-control" type="number" name="age_start" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Age To</label>
                                                    <input class="form-control" type="number" name="age_end" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fat % From</label>
                                                    <input class="form-control" type="text" name="fat_start" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fat % To</label>
                                                    <input class="form-control" type="text" name="fat_end" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                            <option>Bad</option>
                                                            <option>Medium</option>
                                                            <option>Good</option>
                                                            <option>Excellent</option>
                                                            </select>
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
