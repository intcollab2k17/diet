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
                    <h1 class="page-header">Taker's History</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php 
        $id=$_REQUEST['id'];
        $query1=mysqli_query($con,"select * from taker where id='$id'")or die(mysqli_error($con));
                $row1=mysqli_fetch_array($query1);
                    echo "<h3>".$row1['last'].", ".$row1['first']."</h3>";
?>        
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">

                            <div class="panel-group" id="accordion">
<?php
        $query=mysqli_query($con,"select * from monitoring natural join program where id='$id' and monitor_status='Finished'")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){           
            $mid=$row['monitor_id'];
?>                                                     
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['monitor_id'];?>"><?php echo $row['program_name'];?></a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $row['monitor_id'];?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                                                        <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
<?php 
$labels=array("DATES OF WEIGH-IN","WEIGHT","FAT%","VISCERAL FAT","BONE MASS","RMR (INCAL)","METABOLIC AGE","MUSCLE MASS","PHYSIQUE RATING","WATER %","REMARKS");
        $i=2;
        foreach ($labels as $label)
        {
            echo "<tr><td>$label</td>";

             $query2=mysqli_query($con,"select * from result where monitor_id='$mid' order by weighin_date")or die(mysqli_error($con));
                $day=1;
                while ($row2=mysqli_fetch_array($query2)){
                    $rid=$row2['result_id'];
                    if ($i==2)
                    {
                        $date=date('M d, Y',strtotime($row2[$i]));    
                        echo "<td> <a href='' class='btn btn-info btn-block'>Day $day</a> $date</td>";
                        $day++;
                    ?>

<?php                     
                    }
                    else
                    echo "<td>$row2[$i]</td>";

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
                                    </div>
                                </div>
<?php }?>                                
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>                     
                        
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
