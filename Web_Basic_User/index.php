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
                eventLimit: true, // allow "more" link when too many events
            });

            calendar.render();
        });
    </script>
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
<script>
    $(function () {
        $(".footerpage").load("footer.html");
    });
</script>
</html>