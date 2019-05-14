<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Durham University Sport</title>

    <link href='../public/lib/fullcalendar-4.1.0/packages/core/main.css' rel='stylesheet'/>
    <link href='../public/lib/fullcalendar-4.1.0/packages/daygrid/main.css' rel='stylesheet'/>
    <link href='../public/lib/fullcalendar-4.1.0/packages/timegrid/main.css' rel='stylesheet'/>
    <script src='../public/lib/fullcalendar-4.1.0/packages/core/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/interaction/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/daygrid/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/timegrid/main.js'></script>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link href="../public/css/mainpageCSS.css" rel="stylesheet">
    <!--JS-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</head>
<body>
<!-- Page Content  -->
<div class="wrapper">
    <?php
    require_once "header.php";
    ?>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Navigation Bar</span>
                </button>
            </div>
        </nav>
        <div id='calendar'></div>

    </div>
</div>
</body>
<div class="footerpage"></div>

<!--Modal begin-->

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="detailModalLabel">Detail</h4>
            </div>
            <!--         modal body   -->
                <div class="modal-body">
                    <div class="form-group" style="margin: 2px; margin-bottom: 20px">
                        <label for="FacilityNameText">Facility/Event Name:</label>
                        <input type="text" class="form-control" id="FacilityNameText" name="FacilityName" readonly>
                        <label for="StartTimeText">Start Time:</label>
                        <input type="text" class="form-control" id="StartTimeText" name="StartTime" readonly>
                        <label for="EndTimeText">End Time:</label>
                        <input type="text" class="form-control" id="EndTimeText" name="EndTime" readonly>
                        <label for="ContactText">Trainer Contact detail</label>
                        <input type="text" class="form-control" id="ContactText" name="contact" readonly
                               readonly>
                    </div>
                </div>
                <div class="form-group" style="margin: 2px; margin-bottom: 20px">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Go back">
                </div>
        </div>
    </div>
</div>
<!--Modal end-->
<script>
    $(function () {
        $(".footerpage").load("footer.html");
    });
</script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: 'loadCalendar.php',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            editable: true,
            eventClick:function(info){
                $("#detailModal").modal("show");
                var title = info.event.title;
                document.getElementById("FacilityNameText").value=title;
                var bookingstart = info.event.start;
                document.getElementById("StartTimeText").value=bookingstart;
                var bookingend = info.event.end;
                document.getElementById("EndTimeText").value=bookingend;
                var eventid = info.event.id;

                $.ajax({
                    url: '../Web_Basic_User/Ajax-Event-Detail.php?id='+eventid,
                    type:"post",
                    success: got_Event_data,
                    dataType:"json"
                })
                function got_Event_data(Event_data) {
                    if(Event_data==false)
                    {
                        document.getElementById("ContactText").value="is a personal Booking";
                    }else {
                        output = Event_data.Username;
                        document.getElementById("ContactText").value = output;
                    }
                }
                //alert(info.event.title);
            },
            //Block booking
            dateClick:function(info){
                $.ajax({
                    url: '../Web_Basic_User/Ajax-Event.php',
                    type:"post",
                    success: got_Eventday_data,
                    dataType:"json"
                })
                function got_Eventday_data(Event_data) {
                    num=Event_data.length;
                    for (var i = 0; i < num; i++) {
                        if(info.dateStr>=Event_data[i].Starttime&&info.dateStr<=Event_data[i].Endtime){
                            alert("Can not booking");
                        }
                    }
                }
            },
            eventLimit: true, // allow "more" link when too many events
        });

        calendar.render();
    });
</script>
</html>