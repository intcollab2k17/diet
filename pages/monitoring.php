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
                <?php
                        $id=$_REQUEST['id'];
                        $name=mysqli_query($con,"select first,last from taker where id='$id'")or die(mysqli_error($con));
                            $rm=mysqli_fetch_array($name);
                ?>    
                    <h1 class="page-header"><?php echo $rm['last'].", ".$rm['first'];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Evaluation</button>
                            <button type="button" class="btn btn-success btn-lg" onClick="window.Print()"><i class="fa fa-plus"></i> Print</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
<?php 
$mid=$_REQUEST['mid'];
$labels=array("DATES OF WEIGH-IN","WEIGHT","FAT%","VISCERAL FAT","BONE MASS","RMR (INCAL)","METABOLIC AGE","MUSCLE MASS","PHYSIQUE RATING","WATER %","REMARKS");
        $i=2;
        foreach ($labels as $label)
        {
            echo "<tr><td>$label</td>";

             $query=mysqli_query($con,"select * from result where monitor_id='$mid' order by weighin_date")or die(mysqli_error($con));
                $day=1;
                while ($row=mysqli_fetch_array($query)){
                    $rid=$row['result_id'];
                    if ($i==2)
                    {
                        $date=date('M d, Y',strtotime($row[$i]));    
                        echo "<td> <a href='' data-toggle='modal' data-target='#edit$rid' class='btn btn-info btn-block'>Day $day <i class='fa fa-pencil'></i></a> $date</td>";
                        $day++;
                    ?>
<!-- Modal -->
                            <div class="modal fade" id="edit<?php echo $rid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Evaluation Result</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="evaluation_edit.php">
                                                <input type="hidden" name="mid" value="<?php echo $mid;?>">
                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                <input type="hidden" name="rid" value="<?php echo $rid;?>">
                                                <!--row-->  
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Weight</label>
                                                            <input class="form-control" name="weight" placeholder="Current Weight" value="<?php echo $row['weight'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Fat%</label>
                                                            <input class="form-control" name="fat" placeholder="Fat %" value="<?php echo $row['fat'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Visceral</label>
                                                            <input class="form-control" name="visceral" placeholder="Visceral Fat" value="<?php echo $row['visceral'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>BM</label>
                                                            <input class="form-control" name="bone_mass" placeholder="Bone Mass" value="<?php echo $row['bone_mass'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>RMR</label>
                                                            <input class="form-control" name="rmr" placeholder="Resting Metabolic Rate#" value="<?php echo $row['rmr'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>M Age</label>
                                                            <input class="form-control" name="m_age" placeholder="Metabolic Age" value="<?php echo $row['metabolic_age'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--row-->
                                                <!--row-->
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>M Mass</label>
                                                            <input class="form-control" name="muscle_mass" placeholder="Muscle Mass" value="<?php echo $row['muscle_mass'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>PR</label>
                                                            <input class="form-control" name="pr" placeholder="Physique Rating" value="<?php echo $row['physique_rating'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Water %</label>
                                                            <input class="form-control" name="water" placeholder="Water %" value="<?php echo $row['water'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                           <label>Remarks</label>
                                                            <input class="form-control" name="remarks" placeholder="Ideal Weight" value="<?php echo $row['remarks'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--row-->
                                                
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
<?php                     
                    }
                    else
                    echo "<td>$row[$i]</td>";

                }
            echo "</tr>";
            $i++;
        }
?>                                
                                    
                                </thead>
                                <tbody>
<?php
        
        

       
          
          
?>                                   
                                    
                                   
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
                                            <h4 class="modal-title" id="myModalLabel">Add Evaluation</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="evaluation_add.php">
                                                <input type="hidden" name="mid" value="<?php echo $mid;?>">
                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                <!--row-->  
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Weight</label>
                                                            <input class="form-control" name="weight" placeholder="Current Weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Fat%</label>
                                                            <input class="form-control" name="fat" placeholder="Fat %">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Visceral</label>
                                                            <input class="form-control" name="visceral" placeholder="Visceral Fat">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>BM</label>
                                                            <input class="form-control" name="bone_mass" placeholder="Bone Mass">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>RMR</label>
                                                            <input class="form-control" name="rmr" placeholder="Resting Metabolic Rate#">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>M Age</label>
                                                            <input class="form-control" name="m_age" placeholder="Metabolic Age">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--row-->
                                                <!--row-->
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>M Mass</label>
                                                            <input class="form-control" name="muscle_mass" placeholder="Muscle Mass">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>PR</label>
                                                            <input class="form-control" name="pr" placeholder="Physique Rating">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Water %</label>
                                                            <input class="form-control" name="water" placeholder="Water %">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                           <label>Remarks</label>
                                                            <input class="form-control" name="remarks" placeholder="Ideal Weight">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--row-->
                                                
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
