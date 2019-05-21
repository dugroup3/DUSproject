<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>Booking Facility</title>
    <link href='../public/lib/fullcalendar-4.1.0/packages/core/main.css' rel='stylesheet'/>
    <link href='../public/lib/fullcalendar-4.1.0/packages/daygrid/main.css' rel='stylesheet'/>
    <link href='../public/lib/fullcalendar-4.1.0/packages/timegrid/main.css' rel='stylesheet'/>
    <script src='../public/lib/fullcalendar-4.1.0/packages/core/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/interaction/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/daygrid/main.js'></script>
    <script src='../public/lib/fullcalendar-4.1.0/packages/timegrid/main.js'></script>
    <a href="SearchFacility.php"><input type="button" class="btn btn-danger" data-dismiss="modal" value="Go back" style="margin-bottom: 10px"></a>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <!--JS-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <!-- Bootstrap CSS CDN -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <?php
    session_start();
    require_once '../DataBase/database.php';
    $pdo = connectDBPDO();
    $id = $_GET['param'];
    $Username=$_SESSION['User']['Username'];
    $UserID=$_SESSION['User']['UserID'];
    if (empty($_SESSION['User'])) {
        echo "<script>

        alert('You are not logged in yet! please log in first.');

        window.location.href='LoginPage.php';
        </script>";
    }
    $statement = $pdo->query(
        "SELECT FacilityID,Name,Prices,Picture FROM Facility WHERE FacilityID = '$id';");
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $st=$pdo->query(
        "SELECT * FROM User WHERE UserID = '$UserID';");
    $r=$st->fetch(PDO::FETCH_ASSOC);

    $Role=$r['Role'];
    $FacilityName = $row['Name'];
    $Prices = $row['Prices'];
    $Picture = $row['Picture'];
    $FacilityID = $row['FacilityID'];
    if($Role=="Student"){
        $Prices=$Prices*0.8;
    }
    ?>

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
                // /events: 'booking.php',
                events: {
                    url: 'booking.php?id='+<?php echo $id ?>,
                },
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,

                //Prevent anterior dates
                validRange: function (nowDate) {
                    return {start: nowDate} //to prevent anterior dates
                },
                //Select a day to add booking function.
                dateClick: function (info) {
                    var date = info.dateStr;
                    date = formatDate(date);
                    document.getElementById("FacilityDate").value=date;
                    $.ajax({
                        url: '../Web_Basic_User/Ajax-EventByID.php?FacilityID='+<?php echo $FacilityID ?>,
                        type:"post",
                        success: got_Eventday_data,
                        dataType:"json"
                    })
                    function got_Eventday_data(Event_data) {
                        num=Event_data.length;
                        for (var i = 0; i < num; i++) {
                            if(info.dateStr>=Event_data[i].Starttime&&info.dateStr<=Event_data[i].Endtime){
                                alert("Can not booking");
                                return;
                            }else {
                                continue;
                            }
                        }
                        $("#bookingModal").modal("show");
                        if(Event_data.noevent=='ok'){
                            $("#bookingModal").modal("show");
                        }

                    }
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
            });

            calendar.render();
        });

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

    </script>
    <style>

        body {
            margin: 60px 50px;
            padding: 10px;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }


    </style>
</head>
<body>
<i>* The <font color="blue">blue</font> marked events are existing bookings.</i>
<div id='calendar'></div>
<!-- Button trigger modal -->


<!--<button id="bookingModle" type="button" btntype="Booking" class="btn btn-success" data-toggle="modal"-->
<!--        data-target="#bookingModal">Booking-->
<!--</button>-->

<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="bookingModalLabel">Booking Facility</h4>
            </div>
            <!--         modal body   -->
            <form id="add-booking" action="addbooking.php" method="post">
                <div class="modal-body">
                    <div class="form-group" style="margin: 2px; margin-bottom: 20px">
                        <img src="../public/img/<?php echo $Picture ?>" height="150vw" width="150vw" alt="">
                        <input hidden type="text" class="form-control" id="FacilityName" name="FacilityName"
                               value="<?php echo $FacilityName ?>" readonly>
                    </div>
                    <input hidden type="text" readonly name="Username" value="<?php echo $Username?>">
                    <input hidden type="text" readonly name="UserID" value="<?php echo $UserID?>">
                    <label>Date:</label><input style= "background-color:transparent;border:0;" id="FacilityDate" name="FacilityDate2" readonly>
                    <input hidden id="FacilityID" name="FacilityID" value="<?php echo $FacilityID ?>">
                    <div><label for="StartTimeText">Booking Start Time:</label>
                        <select id="start" name="start">
                            <option value="07" selected>7:00:00</option>
                            <option value="08">8:00:00</option>
                            <option value="09">9:00:00</option>
                            <option value="10">10:00:00</option>
                            <option value="11">11:00:00</option>
                            <option value="12">12:00:00</option>
                            <option value="13">13:00:00</option>
                            <option value="14">14:00:00</option>
                            <option value="15">15:00:00</option>
                            <option value="16">16:00:00</option>
                            <option value="17">17:00:00</option>
                            <option value="18">18:00:00</option>
                            <option value="19">19:00:00</option>
                            <option value="20">20:00:00</option>
                            <option value="21">21:00:00</option>
                            <option value="22">22:00:00</option>
                        </select></div>
                    <div><label for="EndTimeText">Booking End Time&nbsp: </label>

                        <select id="end" name="end">
                            <option value="08" selected>8:00:00</option>
                            <option value="09">9:00:00</option>
                            <option value="10">10:00:00</option>
                            <option value="11">11:00:00</option>
                            <option value="12">12:00:00</option>
                            <option value="13">13:00:00</option>
                            <option value="14">14:00:00</option>
                            <option value="15">15:00:00</option>
                            <option value="16">16:00:00</option>
                            <option value="17">17:00:00</option>
                            <option value="18">18:00:00</option>
                            <option value="19">19:00:00</option>
                            <option value="20">20:00:00</option>
                            <option value="21">21:00:00</option>
                            <option value="22">22:00:00</option>
                        </select></div>
                    <script>
                        $("#start").bind("input propertychange", function (event) {
                            var end = document.getElementById("end");
                            while (end.hasChildNodes()) //当div下还存在子节点时 循环继续
                            {
                                end.removeChild(end.firstChild);
                            }
                            var startTime = $("#start").val();
                            var options = document.getElementById("end");
                            for (var i = startTime; i < 22; i++) {
                                var obj = document.createElement("option");
                                var time = parseInt(i) + 1;
                                obj.innerHTML = time + ":00:00";
                                obj.value = time;
                                options.appendChild(obj);
                            }
                        });

                    </script>
                    <script>
                        $("#end").bind("input propertychange", function () {
                            var startTimeP = $("#start").val();
                            var endTimeP=$("#end").val();
                            $("#Totalcost").html((endTimeP-startTimeP)*<?php echo $Prices?>);
                            $("#tc").val((endTimeP-startTimeP)*<?php echo $Prices?>);
                        })


                    </script>
                    <input type="hidden" name="Totalcost" id="tc" value="<?php echo $Prices?>">
                    <div class="">Total cost: £ <span id="Totalcost"><?php echo $Prices?></span></div>
                </div>
                <div class="form-group" style="margin: 2px; margin-bottom: 20px">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Go back">
                    <input type="submit" id="add" style="float:right;" class="btn btn-primary" value="Confirm">
                </div>
        </div>
        </form>
    </div>
</div>
</div>

</body>
</html>
