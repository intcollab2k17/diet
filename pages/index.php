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

        <!-- Navigation -->
        <?php include('nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
<?php

        $query=mysqli_query($con,"select * from taker where status='Active'")or die(mysqli_error($con));
          $takers=mysqli_num_rows($query);
?>                                 
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $takers;?></div>
                                    <div>No. of Takers</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
<?php

        $query2=mysqli_query($con,"select * from product")or die(mysqli_error($con));
          $product=mysqli_num_rows($query2);
?>                                                                 
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $product;?></div>
                                    <div>Available Products</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
<?php
    $result = mysqli_query($con,"SELECT gender FROM `monitoring` natural join taker where monitor_status!='Finished' and gender='male' group by gender");
            $male=mysqli_num_rows($result);
?>               
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-orange">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $male;?></div>
                                    <div> Male </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    $result = mysqli_query($con,"SELECT gender FROM `monitoring` natural join taker where monitor_status!='Finished' and gender='female' group by gender");
            $female=mysqli_num_rows($result);
?>                               
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $female;?></div>
                                    <div> Female </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Product Sales Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="sales-graph"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Takers Chart Per Program
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="program-graph"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Active Takers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                    <th>Program</th>
                                                    <th>Expected End Date</th>
                                                </tr>
<?php
        $a=1;
        $query=mysqli_query($con,"select * from taker order by last,first")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){
            $id=$row['id'];
            $age = date_create($row['bday'])->diff(date_create('today'))->y;

             $query1=mysqli_query($con,"select *,COUNT(*) as day from monitoring natural join program where id='$id' and monitor_status!='Finished' order by monitor_id desc LIMIT 0,1")or die(mysqli_error($con));
                $row1=mysqli_fetch_array($query1);
                      $mid=$row1['monitor_id'];
                      $day=$row1['day'];
                      $start=$row1['start_date'];
                      $end = date("Y-m-d",strtotime($start. " + 10 days")); 
                        $query3=mysqli_query($con,"select * from result where monitor_id='$mid'")or die(mysqli_error($con));
                                $row3=mysqli_fetch_array($query3);
                                    //$date=$row1['weighin_date'];
?>                                                                                   
                                            </thead>
                                            <tbody>
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $a;?></td>
                                        <td><?php echo $row['last'];?></td>
                                        <td><?php echo $row['first'];?></td>
                                        <td><?php echo $age;?></td>
                                        <td><?php echo $row['gender'];?></td>                                        
                                        <td><?php echo $row1['program_name'];?></td>
                                        <td><?php echo date("M d, Y",strtotime($end));?></td>
                                    </tr>
<?php $a++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->

                    </div>

                    <!-- /.panel -->
                    </div>
                <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <i class="fa fa-bell"></i> Out of Stock
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
<?php

        $query=mysqli_query($con,"select * from product where qty<=reorder")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query))
                {
?>                                                         
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-thumb-tack fa-fw"></i> <?php echo $row['prod_name'];?>
                                    <span class="pull-right small badge badge-danger">
                                    <em><?php echo $row['qty'];?></em>
                                    </span>
                                </a>
<?php }?>                                 
                            </div>
                            <!-- /.list-group -->
                        </div>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Ongoing Takers per Gender
                        </div>
                        <div class="panel-body">
                            <div id="gender-graph"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>

                    <!-- /.panel -->
                    <div class="col-lg-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-bell"></i> Best Seller for <?php echo date("M");?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
<?php
        $m=date('m');
        $y=date('Y');
        $query=mysqli_query($con,"select *,SUM(stockout_qty) as qty from stockout natural join product where YEAR(stockout_date)='$y' and MONTH(stockout_date)='$m' group by prod_id order by stockout_qty asc LIMIT 0,10")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query))
                {
?>                                                         
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-thumb-tack fa-fw"></i> <?php echo $row['prod_name'];?>
                                    <span class="pull-right small badge badge-green">
                                    <em><?php echo $row['qty'];?></em>
                                    </span>
                                </a>
<?php }?>                                 
                            </div>
                            <!-- /.list-group -->
                        </div>
                       
                    </div>
                    </div>

                    <!-- /.panel -->
                    </div>
                    
                    
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

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/my_chart.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'program-graph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    spacingBottom: 0,
                    spacingLeft: 0
                },
                title: {
                    text: '',
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '10px', fontSize: '10px' }
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            softConnector: false,
                            color: '#000000',
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '8px', fontSize: '8px' },
                            connectorColor: '#ffbb22',                          
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: '',
                    data: []
                }]
            }
            
            $.getJSON("program_data.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'gender-graph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    spacingBottom: 0,
                    spacingLeft: 0
                },
                title: {
                    text: '',
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '10px', fontSize: '10px' }
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            softConnector: false,
                            color: '#000000',
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '8px', fontSize: '8px' },
                            connectorColor: '#ffbb22',                          
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: '',
                    data: []
                }]
            }
            
            $.getJSON("gender_data.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script><script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'sales-graph',
                  type: 'column',
                  marginRight: 10,
                  marginBottom: 25
                
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Taker\'s Weight Record'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("datasales.php", function(json) {
            options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
      <script src="../js/highcharts.js"></script>
        <script src="../js/exporting.js"></script>
</body>

</html>
