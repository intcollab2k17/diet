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
                    <h1 class="page-header">Inactive Takers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Points</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

        $query=mysqli_query($con,"select * from taker where status='Inactive' order by last,first")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){
            $id=$row['id'];
            $age = date_create($row['bday'])->diff(date_create('today'))->y;

             $query1=mysqli_query($con,"select *,COUNT(*) as day from monitoring natural join program where id='$id' and monitor_status!='Finished' order by monitor_id desc LIMIT 0,1")or die(mysqli_error($con));
                $row1=mysqli_fetch_array($query1);
                      $mid=$row1['monitor_id'];
                      $day=$row1['day'];

                        $query3=mysqli_query($con,"select * from initial_result where id='$id' order by ir_date desc LIMIT 0,1")or die(mysqli_error($con));
                                $row3=mysqli_fetch_array($query3);
                                    $iid=$row3['ir_id'];
?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $row['points'];?></td>
                                        <td><?php echo $row['last'];?></td>
                                        <td><?php echo $row['first'];?></td>
                                        <td><?php echo $age;?></td>
                                        <td><?php echo $row['gender'];?></td>                                        
                                        <td>
                                            <a href="history.php?id=<?php echo $row['id'];?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $id;?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                            <div class="modal fade" id="delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Update Taker's Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!--row-->
                                            <form method="post" action="taker_update.php">
                                            <input class="form-control" name="id" type="hidden" value="<?php echo $row['id'];?>">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                       <label>Last Name</label>
                                                        <input class="form-control" name="last" placeholder="Last Name" value="<?php echo $row['last'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--row-->
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                       <label>First Name</label>
                                                        <input class="form-control" name="first" placeholder="First Name" value="<?php echo $row['first'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--row-->
                                             <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                       <label>Birthday</label>
                                                        <input class="form-control" type="date" name="bday" placeholder="Birthday" value="<?php echo $row['bday'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--row-->        
                                             <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                       <label>Status</label>
                                                        <select class="form-control" name="status">
                                                         <option><?php echo $row['status'];?></option>
                                                         <option>Active</option>
                                                         <option>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--row-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="edit">Save</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            </form>
                            <!-- /.modal -->                                                                    
<?php }?>                                    
                                    
                                   
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
