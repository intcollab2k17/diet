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
                    <h1 class="page-header">Existing Takers</h1>
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
                                        <th>ID no.</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Current Program</th>
                                        <th>Day</th>
                                        <th>Initial</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

        $query=mysqli_query($con,"select * from taker order by last,first")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){
            $id=$row['id'];
            $age = date_create($row['bday'])->diff(date_create('today'))->y;

             $query1=mysqli_query($con,"select *,COUNT(*) as day from monitoring natural join program where id='$id' and monitor_status!='Finished' order by monitor_id desc LIMIT 0,1")or die(mysqli_error($con));
                $row1=mysqli_fetch_array($query1);
                      $mid=$row1['monitor_id'];
                      $day=$row1['day'];

                        $query3=mysqli_query($con,"select * from initial_result where id='$id' order by ir_date desc LIMIT 0,1")or die(mysqli_error($con));
                                $row3=mysqli_fetch_array($query3);
                      
?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $id;?></td>
                                        <td><?php echo $row['last'];?></td>
                                        <td><?php echo $row['first'];?></td>
                                        <td><?php echo $age;?></td>
                                        <td><?php echo $row['gender'];?></td>                                        
                                        <td><?php echo $row1['program_name'];?></td>
                                        <td><?php echo $i;?></td>
                                        <td><a href="" class="btn btn-warning" data-toggle="modal" data-target="#view<?php echo $mid;?>">View</i></a>
                                        </td>
                                        <td>
                                            <a href="taker_sup.php?id=<?php echo $id;?>" class="btn btn-warning"><i class="fa fa-glass"></i></a>
                                            <a href="monitoring.php?id=<?php echo $id;?>&mid=<?php echo $mid;?>" class="btn btn-info"><i class="glyphicon glyphicon-folder-open"></i></a>
                                            <a href="" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $id;?>"><i class="glyphicon glyphicon-share-alt"></i></a>
                                        </td>
                                    </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Enrol in Wellness Program</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="enrol.php">
                                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                <input type="hidden" name="mid" value="<?php echo $mid;?>">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <div class="form-group">
                                                            <label>
                                                                Unfinished program will be stop automatically once enrolled to new program.
                                                            </label>
                                                        </div>
                                                    </div> 
                                                    <hr>
                                                    <div class="form-group">
                                                        <label>Select Wellness Program</label>
                                                        <?php

                                                                    $result = mysqli_query($con,"SELECT * FROM program ORDER BY program_name"); 
                                                                        while ($row = mysqli_fetch_assoc($result)){
                                                        ?>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="program" id="optionsRadios1" value="<?php echo $row['program_id'];?>"><?php echo $row['program_name'];?>
                                                            </label>
                                                        </div>
                                                                
                                                    <?php } ?>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label>Recommended Daily Dietary Supplement</label>
                                                        <?php

                                                                    $result = mysqli_query($con,"SELECT * FROM supplement natural join product ORDER BY prod_name"); 
                                                                        while ($row = mysqli_fetch_assoc($result)){
                                                        ?>
                                                        <div class="radio">
                                                            <label>
                                                               <?php echo $row['prod_name'];?>
                                                            </label>
                                                        </div>
                                                                
                                                    <?php } ?>
                                                    </div> 
                                                    <hr>
                                                    <div class="form-group">
                                                        <label>Recommended Meal</label>
                                                        <?php

                                                                    $result = mysqli_query($con,"SELECT * FROM meal"); 
                                                                        while ($row = mysqli_fetch_assoc($result)){
                                                        ?>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="meal[]" value="<?php echo $row['meal_id'];?>"><?php echo $row['meal_time'];?> - <?php echo $row['meal'];?> (<?php echo $row['calories'];?> cal)
                                                            </label>
                                                        </div>
                                                                
                                                    <?php } ?>
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
                            <!-- Modal -->
                            <div class="modal fade" id="view<?php echo $mid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Initial Wellness Evaluation Result</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!--row-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>Fat%</label>
                                                        <input class="form-control" name="fat" placeholder="Fat %" value="<?php echo $row3['ir_fat'];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>Visceral</label>
                                                        <input class="form-control" name="visceral" placeholder="Visceral Fat" value="<?php echo $row3['ir_visceral'];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>BM</label>
                                                        <input class="form-control" name="bone_mass" placeholder="Bone Mass" value="<?php echo $row3['ir_bonemass'];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>RMR</label>
                                                        <input class="form-control" name="rmr" placeholder="Resting Metabolic Rate#" value="<?php echo $row3['ir_restingmr'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--row-->
                                            <!--row-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>M Age</label>
                                                        <input class="form-control" name="m_age" placeholder="Metabolic Age" value="<?php echo $row3['ir_metabolic_age'];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>M Mass</label>
                                                        <input class="form-control" name="muscle_mass" placeholder="Muscle Mass" value="<?php echo $row3['ir_muscle_mass'];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>PR</label>
                                                        <input class="form-control" name="prating" placeholder="Physique Rating" value="<?php echo $row3['ir_physique_rating'];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>Water %</label>
                                                        <input class="form-control" name="water" placeholder="Water %" value="<?php echo $row3['ir_water'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>Ideal Weight</label>
                                                        <input class="form-control" name="ideal_weight" placeholder="Ideal Weight" value="<?php echo $row3['ir_ideal_weight'];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>Excess Fat</label>
                                                        <input class="form-control" name="excess_fat" placeholder="Excess Fat" value="<?php echo $row3['ir_excess_fat'];?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                       <label>Ideal Visceral</label>
                                                        <input class="form-control" name="ideal_visceral" placeholder="Ideal Visceral" value="<?php echo $row3['ir_ideal_visceral'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--row-->        
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
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
