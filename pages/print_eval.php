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
   </style>

</head>

<body>

    <div id="wrapper">

        <?php //include('nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                <?php
                $id=$_REQUEST['id'];
                $mid=$_REQUEST['mid'];
                $_SESSION['mid'] = $mid; 
                        
                        $name=mysqli_query($con,"select * from taker where id='$id'")or die(mysqli_error($con));
                            $rm=mysqli_fetch_array($name);
                ?>    
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <table style="width: 100%;"  class="noborder">
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
                        <th><?php echo strtoupper($rm['referrer_name']);?></th>
                        <td>Contact #: </td>
                        <th><?php echo strtoupper($rm['referrer_contact']);?></th>
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
                            </table>
                            <div id="graph"></div>
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
