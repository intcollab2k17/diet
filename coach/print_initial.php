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

    <?php //include('css.php');?>
    <style type="text/css">
    tr td{
        border: 1px solid;
    }
    table{
        border-collapse: collapse;

    }
    .noborder tr td{
        border: none

    }
    .border tr th{
       border: 1px solid;

    }
    @media print
     {
        #print {display: none;}
     }
   </style>

</head>

<body>

    <div id="wrapper">

        <?php //include('nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                 <div class="col-md-12" style="text-align: right">
                    <button onclick="window.print()" class="btn btn-success" id="print">Print</button>
                  </div>
                <div class="col-lg-12">
                <?php
                $id=$_REQUEST['id'];
                $iid=$_REQUEST['iid'];
               // $_SESSION['mid'] = $mid; 
                        
                        $name=mysqli_query($con,"select * from taker where id='$id'")or die(mysqli_error($con));
                            $rm=mysqli_fetch_array($name);
                            $gender=$rm['gender'];
                            $age = date_create($rm['bday'])->diff(date_create('today'))->y;
                ?>    
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <table style="width: 100%;text-align: left"  class="noborder">
                    <tr>
                        <td>Last Name: </td>
                        <th><?php echo strtoupper($rm['last']); ?></th>
                        <td>First Name: </td>
                        <th><?php echo strtoupper($rm['first']);?></th>
                        <td>Gender: </td>
                        <th><?php echo strtoupper($rm['gender']);?></th>
                        <td>Birthday: </td>
                        <th><?php echo strtoupper(date("M d, Y",strtotime($rm['bday'])));?></th>
                    </tr>
                    <tr>
                        <td>Phone #: </td>
                        <th><?php echo $rm['phone'];?></th>
                        <td>Height: <b><?php echo $rm['height'];?></b></td>
                        <td>Weight: <b><?php echo $rm['orig_weight'];?></b></td>
                        <td>Invited By: </td>
                        <th>
                        <?php
                        $rid=$rm['referrer_id'];
                        $referrer=mysqli_query($con,"select * from taker where id='$rid'")or die(mysqli_error($con));
                            $r=mysqli_fetch_array($referrer);
                            echo strtoupper($r['last'].", ".$r['first']);?></th>
                        <td>Contact #: </td>
                        <th><?php echo strtoupper($rm['referrer_contact']);?></th>
                    </tr>    
                </table>

                              <br>
    
                            <table width="100%" class="border">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>WEIGHT</th>
                                        <th>FAT%</th>
                                        <th>VISCERAL FAT</th>
                                        <th>BONE MASS</th>
                                        <th>RMR (INCAL)</th>
                                        <th>METABOLIC AGE</th>
                                        <th>MUSCLE MASS</th>
                                        <th>PHYSIQUE RATING</th>
                                        <th>WATER %</th>
                                        
                                    </tr>

<?php
             $query=mysqli_query($con,"select * from initial_result where ir_id='$iid'")or die(mysqli_error($con));
                $day=1;
                $row=mysqli_fetch_array($query);
                $fat=$row['ir_fat'];

             

?>                    

                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['ir_date'];?></td>
                                        <td><?php echo $row['ir_weight'];?></td>
                                        <td><?php echo $row['ir_fat'];?></td>
                                        <td><?php echo $row['ir_visceral'];?></td>
                                        <td><?php echo $row['ir_bonemass'];?></td>
                                        <td><?php echo $row['ir_restingmr'];?></td>
                                        <td><?php echo $row['ir_metabolic_age'];?></td>
                                        <td><?php echo $row['ir_muscle_mass'];?></td>
                                        <td><?php echo $row['ir_physique_rating'];?></td>
                                        <td><?php echo $row['ir_water'];?></td>
                                       
                                    </tr>                                    
                                   
                                </tbody>
                            </table>
                            <img src="../dist/img/body_index.jpg" style="width: 30%;float: left">
                            <br>
                            <table width="30%" class="border" style="float: right">
                                <thead>
                                    <tr>
                                        <th>BODY MASS INDEX</th>
                                        <th>BODY FAT INDEX</th>
                                        <th>REMARKS</th>
                                        
                                    </tr>

<?php
             $query=mysqli_query($con,"select * from initial_result where ir_id='$iid'")or die(mysqli_error($con));
                $day=1;
                $row=mysqli_fetch_array($query);
                   
                    $bmi=$row['bmi'];

                    $query2=mysqli_query($con,"select * from bfi where age_start<='$age' and age_end>='$age' and gender='$gender' and fat_start<='$fat' and fat_end>='$fat'")or die(mysqli_error($con));
                
                $row2=mysqli_fetch_array($query2);

                $bfi_status=$row2['bfi_status'];
                 
?>                                
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo number_format($bmi,1);?> kg/m2</td>
                                        <td><?php echo $bfi_status;?></td>
                                        <td><?php echo $row['remarks'];?></td>
                                       
                                    </tr>                                    
                                   
                                </tbody>
                            </table>
                           <br><br><br><br><br>
                            <h3 style="text-align: center;"><u><?php echo $_SESSION['name'];?></u><br>Diet Coach</h3>
                            <h3 style="text-align: center;"></h3>
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
    
</body>

</html>
