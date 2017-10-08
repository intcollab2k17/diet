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
                $mid=$_REQUEST['mid'];
                $_SESSION['mid'] = $mid; 
                        
                        $name=mysqli_query($con,"select * from taker where id='$id'")or die(mysqli_error($con));
                            $rm=mysqli_fetch_array($name);

                            $age = date_create($rm['bday'])->diff(date_create('today'))->y;
                ?>    
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <table style="width: 100%;text-align: left;"  class="noborder">
                    <tr>
                        <td>Name: </td>
                        <th><?php echo strtoupper($rm['last']); ?>
                        , <?php echo strtoupper($rm['first']);?></th>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <th><?php echo strtoupper($rm['address']); ?></th>
                        <td>Age </td>
                        <th><?php echo strtoupper($age); ?></th>
                        <td>Height:</td>
                        <th><?php echo $rm['height'];?>m</th>
                    </tr>
                    <tr>
                        
                        
                    </tr>
                    <tr>
                        <td>Phone #: </td>
                        <th><?php echo $rm['phone'];?></th>
                        <td>Email: </td>
                        <th><?php echo strtoupper($rm['email']);?></th>
                        <td>Gender: </td>
                        <th><?php echo strtoupper($rm['gender']);?></th>
                    </tr>
                    <tr>
                        <td>Birthday: </td>
                        <th><?php echo strtoupper(date("M d, Y",strtotime($rm['bday'])));?></th>
<?php
  $p=mysqli_query($con,"select * from monitoring natural join program where monitor_status<>'Finished' and id='$id'")or die(mysqli_error($con));
                            $p1=mysqli_fetch_array($p);
?>                        
                        <td>Program: </td>
                        <th><?php echo strtoupper($p1['program_name']);?></th>
                        <td>Target: </td>
                        <th><?php echo strtoupper($p1['target']);?></th>
                    </tr>

                </table>
                              <br>
    
                            <table width="100%">
                                <thead>
<?php 
$mid=$_REQUEST['mid'];
$labels=array("DATES OF WEIGH-IN","WEIGHT","FAT%","VISCERAL FAT","BONE MASS","RMR (INCAL)","METABOLIC AGE","MUSCLE MASS","PHYSIQUE RATING","WATER %","REMARKS");
        $i=2;
        foreach ($labels as $label)
        {
            echo "<tr><td><b>$label</b></td>";

             $query=mysqli_query($con,"select * from result where monitor_id='$mid' order by weighin_date")or die(mysqli_error($con));
                $day=1;
                while ($row=mysqli_fetch_array($query)){
                    $rid=$row['result_id'];
                    if ($i==2)
                    {
                        $date=date('M d, Y',strtotime($row[$i]));    
                        echo "<td><b> $date</b></td>";
                        $day++;
                    ?>
<!-- Modal -->
                                                         
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
                            </table><br><br>
                            <h3 style="text-align: center;">______________________________</h3>
                            <h3 style="text-align: center;">Diet Coach</h3>
                            <table style="width:30%;float: right">
                            <?php 
                        
        $query=mysqli_query($con,"select * from taker_meal natural join meal where id='$id'")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){
            $id=$row['id'];
                            ?>
                                <tr>
                                    <td> 
                                                    <?php echo $row['meal_time']. " - ".$row['meal'];?> 
                                                   
                                </tr>
                            <?php }?>
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
    
</body>

</html>
