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
                    <h1 class="page-header">Transaction</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="transaction_add.php">
                              <div class="row">
                                  <div class="col-lg-8">
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
                                                    <button class="btn btn-lg btn-primary" type="submit" tabindex="3" name="addtocart">+</button>
                                                </div>
                                            </div>  
                                         </div><!-- col-md-2 -->
                                        </form> 
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                              <tr>
                                                <th>Qty</th>
                                                <th>Product Name</th>
                                                <th>Points</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                        <?php
                                
                                $query=mysqli_query($con,"select * from temp_trans natural join product")or die(mysqli_error());
                                    $total=0;
                                while($row=mysqli_fetch_array($query)){
                                        $id=$row['temp_trans_id'];
                                           $total=$total+$row['points']; 
                        ?>
                                              <tr >
                                                <td><?php echo $row['prod_qty'];?></td>
                                                <td class="record"><?php echo $row['prod_name'];?></td>
                                                <td><?php echo $row['points'];?></td>
                                                <td>
                                                    
                                                    <a href="#delete<?php echo $row['temp_trans_id'];?>" data-target="#delete<?php echo $row['temp_trans_id'];?>" data-toggle="modal" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>

                                                </td>
                                              </tr>
<div id="delete<?php echo $row['temp_trans_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Item</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="transaction_del.php" enctype='multipart/form-data'>
          <input type="hidden" class="form-control" id="price" name="id" value="<?php echo $row['temp_trans_id'];?>" required>  
        <p>Are you sure you want to remove <?php echo $row['prod_name'];?>?</p>
        
              </div><br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                            <tr>
                                                    <td colspan="3">Total Points</td>
                                                    <td>
                                                        <input type="hidden" class="form-control" id="total" name="total" placeholder="Total" 
                                                        value="<?php echo number_format($total,2);?>" readonly>
                                                        <b><?php echo number_format($total,2);?></b>
                                                    </td>        
                                                </tr>                             
                                           
                        <?php }?>                     
                                            </tbody>
                                            
                                          </table>
                                      </div><!-- /.row -->
                                  </div><!-- col-md-8 -->
                                  <div class="col-lg-4">
                                     <form method="post" name="autoSumForm" action="add.php">
                                           <div class="row">
                                             <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label for="date">Taker Name</label>
                                                        <select class="form-control select2" name="taker" tabindex="1" autofocus required>
                                                        <?php
                                                             $query2=mysqli_query($con,"select * from taker order by last,first")or die(mysqli_error());
                                                                while($row=mysqli_fetch_array($query2)){
                                                        ?>
                                                                <option value="<?php echo $row['id'];?>"><?php echo $row['last']." ".$row['first']." - Available Points ".$row['points'];?></option>
                                                          <?php }?>
                                                        </select>
                                                  </div><!-- /.form group -->
                                                  <div class="form-group">
                                                    <label for="date">Discount %</label>
                                                        <select class="form-control select2" name="discount" tabindex="1">
                                                                <option value="1">None</option>
                                                                <option value=".25">25</option>
                                                                <option value=".35">35</option>
                                                                <option value=".42">42</option>
                                                                <option value=".5">50</option>    
                                                        </select>
                                                  </div><!-- /.form group -->
                                      
                                            </div>
                                            
                                            

                                        </div>  
                                       
                                          
                                         
                                              <button class="btn btn-lg btn-primary" id="daterange-btn" name="credit" type="submit"  tabindex="7">
                                                Finish
                                              </button>
                                              <button class="btn btn-lg" id="daterange-btn" type="reset"  tabindex="8">
                                                <a href="cancel.php">Cancel</a>
                                              </button>
                                      
                                        </form> 
                                  </div>
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
