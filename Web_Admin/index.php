<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../public/lib/fullcalendar-4.1.0/packages/core/main.css' rel='stylesheet'/>
    <link href='../public/lib/fullcalendar-4.1.0/packages/daygrid/main.css' rel='stylesheet'/>
    <link href='../public/lib/fullcalendar-4.1.0/packages/timegrid/main.css' rel='stylesheet'/>
    <script src='../public/lib/fullcalendar-4.1.0/packages/core/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/interaction/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/daygrid/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/timegrid/main.js'></script>
    <link href="../public/css/bootstrap.css" rel="stylesheet"/>
    <link href="../public/css/AdminCSS.css" rel="stylesheet"/>


    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Durham University Sport</title>
</head>
<body>
<div class="headerPage">
    <?php
    include 'Admin_header.php';
    ?>
</div>
<div class="Mycontainer" style="background: #742e68; margin-top: 100px">
    <h1 class="MyAdminH1">Admin Page</h1>
</div>
<div class="Mycontainer" style="background: white">

    <div id='calendar'></div>
</div>

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
</body>
<div class="footerpage">

</div>

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
                $("#detailModal").modal();
                var title = info.event.title;
                document.getElementById("FacilityNameText").value=title;
                var bookingstart = info.event.start;
                document.getElementById("StartTimeText").value=bookingstart;
                var bookingend = info.event.end;
                document.getElementById("EndTimeText").value=bookingend;
                var eventid = info.event.id;

                $.ajax({
                    url: '../Web_Admin/Ajax-Event-Detail.php?id='+eventid,
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
            eventLimit: true, // allow "more" link when too many events
        });

        calendar.render();
    });
</script>
</html>

