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
                    <h1 class="page-header">Admin Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<?php
  $id=$_SESSION['id'];
  $query=mysqli_query($con,"select * from admin where admin_id='$id'")or die(mysqli_error());
      $row=mysqli_fetch_array($query);
?>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="profile_update.php">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div class="row">
                                        <div class=" col-md-8">
                                            <div class="form-group">
                                                <label for="date">Full Name</label>
                                                <div class="input-group">
                                                  <input type="text" class="form-control pull-right" id="date" name="name" placeholder="Full Name" tabindex="2" value="<?php echo $row['name'];?>"  required>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                         </div><!-- col-md-2 -->
                                         <div class=" col-md-8">
                                            <div class="form-group">
                                                <label for="date">Username</label>
                                                <div class="input-group">
                                                  <input type="text" class="form-control pull-right" id="date" name="username" placeholder="Username" tabindex="2" value="<?php echo $row['username'];?>" required>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                         </div><!-- col-md-2 -->
                                         <div class=" col-md-8">
                                            <div class="form-group">
                                                <label for="date">Password</label>
                                                <div class="input-group">
                                                  <input type="password" class="form-control pull-right" id="date" name="password" placeholder="Password" tabindex="2" value="<?php echo $row['password'];?>" required>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                         </div><!-- col-md-2 -->
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date"></label>
                                                <div class="input-group">
                                                    <button class="btn btn-primary" type="submit" tabindex="3" name="addtocart">Update Changes</button>
                                                </div>
                                            </div>  
                                         </div><!-- col-md-2 -->
                                        </form> 
                                        
                                      </div><!-- /.row -->
                                  </div><!-- col-md-8 -->
                                  
                              </div>
                            </form> 
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
