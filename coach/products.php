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
                    <h1 class="page-header">Product List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Product </button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Vol Pts</th>
                                        <th>C 25%</th>
                                        <th>SC 35%</th>
                                        <th>SB 42%</th>
                                        <th>SUPV 50%</th>
                                        <th>Retail</th>
                                        <th>Profit C</th>
                                        <th>Profit SC</th>
                                        <th>Profit SB</th>
                                        <th>Profit SUPV</th>
                                        <th>Qty Left</th>
                                        <th>Reorder</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

        $query=mysqli_query($con,"select * from product natural join category order by prod_name")or die(mysqli_error($con));
            $i=1;
          while ($row=mysqli_fetch_array($query)){
            $id=$row['prod_id'];
?>                                   
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $i;?></td>
                                        <td><?php echo $row['prod_name'];?></td>
                                        <td><?php echo $row['cat_name'];?></td>
                                        <td><?php echo $row['vol_pts'];?></td>
                                        <td><?php echo $row['c'];?></td>
                                        <td><?php echo $row['sc'];?></td>
                                        <td><?php echo $row['sb'];?></td>
                                        <td><?php echo $row['supv'];?></td>
                                        <td><?php echo $row['retail'];?></td>
                                        <td><?php echo $row['profitc'];?></td>
                                        <td><?php echo $row['profitsc'];?></td>
                                        <td><?php echo $row['profitsb'];?></td>
                                        <td><?php echo $row['profitsupv'];?></td>
                                        <td><?php echo $row['qty'];?></td>
                                        <td><?php echo $row['reorder'];?></td>
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
                                            <h4 class="modal-title" id="myModalLabel">Edit Wellness Program</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="product_edit.php">
                                                <input type="hidden" name="id" value="<?php echo $row['prod_id'];?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <input class="form-control" type="text" name="product" value="<?php echo $row['prod_name'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Vol Pts</label>
                                                            <input class="form-control" type="text" name="pts" value="<?php echo $row['vol_pts'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Retail Price</label>
                                                            <input class="form-control" type="text" name="price" value="<?php echo $row['retail'];?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select class="form-control" name="cat">
                                                        <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php

    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row1 = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row1['cat_id'];?>"><?php echo $row1['cat_name'];?></option>
<?php } ?> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input class="form-control" type="number" name="qty" value="<?php echo $row['qty'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Reorder</label>
                                                            <input class="form-control" type="number" name="reorder" value="<?php echo $row['reorder'];?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> C </label>
                                                            <input class="form-control" type="text" name="c" value="<?php echo $row['c'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="pc" value="<?php echo $row['profitc'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> SC </label>
                                                            <input class="form-control" type="text" name="sc" value="<?php echo $row['sc'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psc" value="<?php echo $row['profitsc'];?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> SB </label>
                                                            <input class="form-control" type="text" name="sb" value="<?php echo $row['sb'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psb" value="<?php echo $row['profitsb'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> supv </label>
                                                            <input class="form-control" type="text" name="supv" value="<?php echo $row['supv'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psupv" value="<?php echo $row['profitsupv'];?>" required>
                                                        </div>
                                                    </div>
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
                                            <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="product_add.php">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <input class="form-control" type="text" name="product" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Vol Pts</label>
                                                            <input class="form-control" type="text" name="pts" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Retail Price</label>
                                                            <input class="form-control" type="text" name="price" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select class="form-control" name="cat">
<?php

    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php } ?> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input class="form-control" type="number" name="qty" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Reorder</label>
                                                            <input class="form-control" type="number" name="reorder" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> C </label>
                                                            <input class="form-control" type="text" name="c" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="pc" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> SC </label>
                                                            <input class="form-control" type="text" name="sc" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psc" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> SB </label>
                                                            <input class="form-control" type="text" name="sb" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psb" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> supv </label>
                                                            <input class="form-control" type="text" name="supv" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Profit </label>
                                                            <input class="form-control" type="text" name="psupv" required>
                                                        </div>
                                                    </div>
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
