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
                    <h1 class="page-header">Stockin Transaction</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="stockin_add.php">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div class="row">
                                        <div class="col-md-8">
                                          <div class="form-group">
                                            <label for="date">Product Name</label>
                                             
                                                <select class="form-control select2" name="prod" tabindex="1" autofocus required>
                                                <?php
                                                     $query2=mysqli_query($con,"select * from product order by prod_name")or die(mysqli_error());
                                                        while($row=mysqli_fetch_array($query2)){
                                                ?>
                                                        <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name']." Available(".$row['qty'].")";?></option>
                                                  <?php }?>
                                                </select>
                                            </div><!-- /.form group -->
                                        </div><!-- /col-md-6 -->
                                        <div class=" col-md-2">
                                            <div class="form-group">
                                                <label for="date">Quantity</label>
                                                <div class="input-group">
                                                  <input type="number" class="form-control pull-right" id="date" name="qty" placeholder="Quantity" tabindex="2" value="1"  required>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                         </div><!-- col-md-2 -->
                                         <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="date"></label>
                                                <div class="input-group">
                                                    <button class="btn btn-primary" type="submit" tabindex="3" name="addtocart">Stockin</button>
                                                </div>
                                            </div>  
                                         </div><!-- col-md-2 -->
                                         
                                        </form> 

                                      <div class="col-md-12">
                                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Stockin Date</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

        $query=mysqli_query($con,"select * from stockin natural join product order by stockin_date desc")or die(mysqli_error($con));
            $i=1;
          while ($row=mysqli_fetch_array($query)){
            $id=$row['prod_id'];
?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $i;?></td>
                                        <td><?php echo $row['prod_name'];?></td>
                                        <td><?php echo $row['stockin_qty'];?></td>
                                        <td><?php echo date("M d, Y h:i A",strtotime($row['stockin_date']));?></td>
                                    </tr>
<?php $i++;}?>                                    
                                    
                                   
                                </tbody>
                            </table>
                            </div>
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
