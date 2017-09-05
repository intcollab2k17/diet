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

    <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.print.css" media="print">
    <script>
    $(function() {
      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Are you sure you want to remove this schedule?"))
      {
    $.ajax({
    type: "GET",
    url: "schedule_del.php",
    data: dataString,
    success: function(){
        
          }
      });
      
      $(this).parents("tr").animate({ backgroundColor: "#fbc7c7" }, "fast")
      .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>
</head>

<body>

    <div id="wrapper">

        <?php include('nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Calendar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Calendar </button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="calendar"></div>
                            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Event</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Time</th>
                        <th>All Day</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
        
        $query=mysqli_query($con,"select * from schedule order by sched_from desc")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
        
?>  
          
                      <tr>
                        <td id="record"><?php echo $row['sched_event'];?></td>
                        <td><?php echo date("M d, Y",strtotime($row['sched_from']));?></td>
            <td><?php echo date("M d, Y",strtotime($row['sched_to']));?></td>
            <td><?php echo date("h:i A",strtotime($row['sched_time']));?></td>
            <td><?php echo $row['sched_allday'];?></td>
                  <td>
                                 <a href="#updateordinance<?php echo $row['sched_id'];?>" data-target="#updateordinance<?php echo $row['sched_id'];?>" data-toggle="modal" class="small-box-footer"><i class="glyphicon glyphicon-edit"></i></a>
                              <a  href="#" id="<?php echo $row['sched_id'];?>" class="btn_delete" title="Delete"><i class="glyphicon glyphicon-remove-sign text-red"></i></a>
                                </td>
                      </tr>
                  
<div id="updateordinance<?php echo $row['sched_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Schedule Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="schedule_update.php" enctype='multipart/form-data'>
                <div class="form-group">
          <label class="control-label col-lg-3" for="title">Event Name</label>
          <div class="col-lg-9"><input type="hidden" value="<?php echo $row['sched_id'];?>" name="id">  
                        <input type="text" class="form-control" id="title" name="event" value="<?php echo $row['sched_event'];?>">  
          </div>
                </div> 
        
        <div class="form-group">
          <label class="control-label col-lg-3" for="from">Start Date</label>
          <div class="col-lg-9">
                       <input type="date" class="form-control" id="from" name="from" value="<?php echo $row['sched_from'];?>">  
          </div>
                </div> 
                <div class="form-group">
          <label class="control-label col-lg-3" for="to">End Date</label>
          <div class="col-lg-9">
                       <input type="date" class="form-control" id="to" name="to" value="<?php echo $row['sched_to'];?>">  
          </div>
                </div>
                <div class="form-group">
          <label class="control-label col-lg-3" for="time">Time</label>
          <div class="col-lg-9">
                       <input type="time" class="form-control" id="time" name="time" value="<?php echo $row['sched_time'];?>">  
          </div>
                </div>
                <div class="col-sm-12">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="allday" value="true" <?php $all=$row['sched_allday'];if ($all=="true")echo 'checked';?>> All Day Event
                          </label>
                        </div>
                  </div><br><br>
                
              </div><br><br><br><br><br>
              <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div></form>
            </div>
            
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                     
<?php }?>                     
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Event</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Time</th>
                        <th>All Day</th>
                        <th>Action</th>
                      </tr>                   
                    </tfoot>
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
                                            <h4 class="modal-title" id="myModalLabel">Add New Event</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="schedule_add.php" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label for="event">Event</label>
                    <div class="input-group col-md-12">
                      <textarea class="form-control" id="event" name="event" placeholder="Title of Event" required></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="time">Time</label>
                    <div class="input-group">
                      <input type="time" class="form-control" id="time" name="time" value="<?php date_default_timezone_set("Asia/Manila"); echo date("H:i");?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="file">Start Date</label>
                    <div class="input-group">
                      <input type="date" class="form-control" id="file" name="start" value="<?php echo date("Y-m-d");?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <!-- Date and time range -->
                  <div class="form-group">
                    <label for="date">End Date</label>
                    <div class="input-group">
                      <input type="date" class="form-control pull-right" id="date" name="end" value="<?php echo date("Y-m-d");?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="col-sm-12">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="allday" value="true"> All Day Event
                          </label>
                        </div>
                  </div><br><br>
                  <!-- Date and time range -->
                  <div class="form-group">
                    
                    <div class="input-group">
                      <button class="btn btn-primary" id="daterange-btn" name="">
                        Save
                      </button>
                      <button class="btn" id="daterange-btn" type="reset">
                        Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->
                </form> 
                                        </div>   
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
    <!-- jQuery -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="../dist/js/moment.min.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../plugins/fullcalendar/fullcalendar.min.js"></script>
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
    <script>
        $.ajax({
       url: 'process.php',
       type: 'POST',
       
       async: false,
       success: function(response){
         json_events = response;
       }
    });

    $('#calendar').fullCalendar({
       events: JSON.parse(json_events)
    });
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
                
        $('#calendar').fullCalendar({
            
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1),
              backgroundColor: "#f56954", //red
              borderColor: "#f56954" //red
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d - 5),
              end: new Date(y, m, d - 2),
              backgroundColor: "#f39c12", //yellow
              borderColor: "#f39c12" //yellow
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false,
              backgroundColor: "#0073b7", //Blue
              borderColor: "#0073b7" //Blue
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false,
              backgroundColor: "#00c0ef", //Info (aqua)
              borderColor: "#00c0ef" //Info (aqua)
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
              backgroundColor: "#00a65a", //Success (green)
              borderColor: "#00a65a" //Success (green)
            },
            {
              title: 'Click for Google',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://google.com/',
              backgroundColor: "#3c8dbc", //Primary (light-blue)
              borderColor: "#3c8dbc" //Primary (light-blue)
            }
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
    </script>
</body>

</html>
 <script>
    $(function() {
      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Are you sure you want to remove this schedule?"))
      {
    $.ajax({
    type: "GET",
    url: "schedule_del.php",
    data: dataString,
    success: function(){
        
          }
      });
      
      $(this).parents("tr").animate({ backgroundColor: "#fbc7c7" }, "fast")
      .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>