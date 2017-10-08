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
    <style tyle="text/css">
     @media print
     {
        #print {display: none;}
     }
     
  </style>
   

</head>

<body>

    <div id="wrapper">

        <?php include('nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                    <h4 style="text-align: center;">RDA Happy Fit Club <br>Circumferential Road, Carlos Hilado Highway, Brgy. Bata <br>09267486448/09212812057</h4>
                   <h3 class="page-header" style="text-align: center;">Sales Report for the Month of <?php echo date('M');?></h3>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-md-12" style="text-align: right">
                    <button onclick="window.print()" class="btn btn-success" id="print">Print</button>
                  </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
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
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Evaluation</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="evaluation_add.php">
                                                <input type="hidden" name="mid" value="<?php echo $mid;?>">
                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                <!--row-->  
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Weight</label>
                                                            <input class="form-control" name="weight" placeholder="Current Weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Fat%</label>
                                                            <input class="form-control" name="fat" placeholder="Fat %">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Visceral</label>
                                                            <input class="form-control" name="visceral" placeholder="Visceral Fat">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>BM</label>
                                                            <input class="form-control" name="bone_mass" placeholder="Bone Mass">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>RMR</label>
                                                            <input class="form-control" name="rmr" placeholder="Resting Metabolic Rate#">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>M Age</label>
                                                            <input class="form-control" name="m_age" placeholder="Metabolic Age">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--row-->
                                                <!--row-->
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>M Mass</label>
                                                            <input class="form-control" name="muscle_mass" placeholder="Muscle Mass">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>PR</label>
                                                            <input class="form-control" name="pr" placeholder="Physique Rating">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                           <label>Water %</label>
                                                            <input class="form-control" name="water" placeholder="Water %">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                           <label>Remarks</label>
                                                            <input class="form-control" name="remarks" placeholder="Ideal Weight">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--row-->
                                                
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
    <script src="../js/highcharts.js"></script> <!-- chart -->
    <script src="../js/exporting.js"></script> <!-- chart-->
    <script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph',
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
                      text: 'Monthly Sales Report'
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
    
</body>

</html>
