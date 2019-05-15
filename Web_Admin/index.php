<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Durham University Sport</title>
    <link href="../public/css/bootstrap.css" rel="stylesheet"/>
    <link href="../public/css/AdminCSS.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.min.css"/>
    <link href="../public/css/testcss.css" rel="stylesheet"/>

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
    <?php
    require_once '../DataBase/database.php';
    ?>
    <!--Facility select -->
    <div class="form-group" style="width: 200px">
        <label for="name" style="font-size: large">Select Facility: </label>
        <select class="form-control" id="Facility_selector">
            <option value="all">All</option>
            <?php
            $rows = getFacilityList();
            $data_count = count($rows);
            for ($i = 0; $i < $data_count; $i++) {
                $ID = $rows[$i]['FacilityID'];
                $Name = $rows[$i]['Name'];
                echo "<option value='$ID'>$Name</option>";
            }
            ?>
        </select>
    </div>
    <!--Facility select end -->
</div>

<div class="Mycontainer" style="background: white">
    <div id="mycalendar"></div>
</div>
<!--Modal start-->
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
    $('#mycalendar').fullCalendar({
        header: {//Set the calendar header.
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: 'loadCalendar.php',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        editable: true,
        eventClick: function (event) {
            $("#detailModal").modal();
            var title = event.title;
            document.getElementById("FacilityNameText").value = title;
            var bookingstart = event.start;
            document.getElementById("StartTimeText").value = bookingstart;
            var bookingend = event.end;
            document.getElementById("EndTimeText").value = bookingend;
            var eventid = event.id;

            $.ajax({
                url: 'Ajax-Event-Detail.php?id=' + eventid,
                type: "post",
                success: got_Event_data,
                dataType: "json"
            })

            function got_Event_data(Event_data) {
                if (Event_data == false) {
                    document.getElementById("ContactText").value = "is a personal Booking";
                } else {
                    output = Event_data.Username;
                    document.getElementById("ContactText").value = output;
                }
            }

            //alert(info.event.title);
        },
        eventRender: function eventRender(event, element, view) {
            return ['all', event.FacilityID].indexOf($('#Facility_selector').val()) >= 0
        }
    });

    $('#Facility_selector').on('change', function () {
        $('#mycalendar').fullCalendar('rerenderEvents');
    })

</script>

</html>

