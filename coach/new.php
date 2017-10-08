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

<body style="background-color: #ffbb22!important">

    <div id="wrapper">

        <?php include('nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Wellness Survey</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                           New Taker
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form method="post" action="new_add.php">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Last Name</label>
                                        <input class="form-control" name="last" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>First Name</label>
                                        <input class="form-control" name="first" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                           <label>Gender<br><br></label>
                                           <label class="radio-inline">
                                               <input type="radio" name="gender" id="optionsRadiosInline1" value="Male" checked="">Male
                                           </label>
                                           <label class="radio-inline">
                                               <input type="radio" name="gender" id="optionsRadiosInline2" value="Female">Female
                                           </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Birthday</label>
                                        <input class="form-control" name="bday" placeholder="Birthday" type="date">
                                    </div>
                                </div>
                            </div><!--row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Phone #</label>
                                        <input class="form-control" name="phone" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Height</label>
                                        <input class="form-control" name="height" placeholder="Height in meter">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Weight</label>
                                        <input class="form-control" name="weight" placeholder="Weight in Kg">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Invited by</label>
                                         <select class="form-control" name="referrer">
                                            <option value="0">None</option>
<?php

    $result = mysqli_query($con,"SELECT * FROM taker ORDER BY last,first"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['id'];?>"><?php echo $row['last'].", ".$row['first'];?></option>
<?php } ?> 
                                                            </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Contact #</label>
                                        <input class="form-control" name="rcontact" placeholder="Referrer Contact #">
                                    </div>
                                </div>
                            </div>
                            <!--row--><hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Please check the box for YES answers</h3>
                                </div>
                            </div>
                            <div class="row">
<?php

        $query=mysqli_query($con,"select * from question")or die(mysqli_error($con));
            $i=1;
          while ($row=mysqli_fetch_array($query)){
            $id=$row['question_id'];
?>                               
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            <label></label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="question[]" value="<?php echo $id;?>"><?php echo $row['question'];?>
                                                </label>
                                            </div>
                                        </div>
                                </div>
<?php }?>                                
                            </div><!--row-->
                            <hr>
                            <!--row-->
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Fat%</label>
                                        <input class="form-control" name="fat" placeholder="Fat %">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Visceral Fats</label>
                                        <input class="form-control" name="visceral" placeholder="Visceral Fat">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Bone Mass</label>
                                        <input class="form-control" name="bone_mass" placeholder="Bone Mass">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                       <label>Resting Metabolic Rate</label>
                                        <input class="form-control" name="rmr" placeholder="Resting Metabolic Rate#">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Metabolic Age</label>
                                        <input class="form-control" name="m_age" placeholder="Metabolic Age">
                                    </div>
                                </div>
                            </div>
                            <!--row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Muscle Mass</label>
                                        <input class="form-control" name="muscle_mass" placeholder="Muscle Mass">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Physique Rating</label>
                                        <input class="form-control" name="prating" placeholder="Physique Rating">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Water %</label>
                                        <input class="form-control" name="water" placeholder="Water %">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Ideal Weight</label>
                                        <input class="form-control" name="ideal_weight" placeholder="Ideal Weight">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Excess Fat</label>
                                        <input class="form-control" name="excess_fat" placeholder="Excess Fat">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <label>Ideal Visceral</label>
                                        <input class="form-control" name="ideal_visceral" placeholder="Ideal Visceral">
                                    </div>
                                </div>
                            </div>
                            <!--row-->
                            <!--row-->
                            <div class="row pull-right">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-lg btn-info">Save changes</button>
                                    <button type="reset" class="btn btn-lg btn-default">Clear</button>
                                </div>
                            </div>
                            <!--row-->
                        </div>    
                        <!--panel body-->
                        </form>
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
