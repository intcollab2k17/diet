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
                    <h1 class="page-header">Profiling</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button>Add Taker</button>
                        </div>
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

        $query=mysqli_query($con,"select * from taker order by last,first")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){
            $id=$row['id'];
            $age = date_create($row['bday'])->diff(date_create('today'))->y;
?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $id;?></td>
                                        <td><?php echo $row['last'];?></td>
                                        <td><?php echo $row['first'];?></td>
                                        <td><?php echo $age;?></td>
                                        <td><?php echo $row['gender'];?></td>
                                        <td><?php echo $row['status'];?></td>
                                        <td>
                                            <a href="" class="btn btn-success btn-circle"><i class="fa fa-list-alt  
"></i></a>
                                        </td>
                                    </tr>
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
