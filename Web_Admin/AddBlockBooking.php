<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/bootstrap.css" rel="stylesheet"/>
    <link href="../public/css/style.css" rel="stylesheet"/>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!--    <link rel="stylesheet" href="https://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="../public/js/bootstrap.js"></script>
    <script src="../public/js/script.js"></script>
    <title>Durham University Sport</title>
</head>
<body>
<div class="headerPage">
    <?php
    include 'Admin_header.php';
    require_once "../DataBase/database.php";
    ?>
</div>
<div class="Mycontainer" style="background: #742e68; margin-top: 100px">
    <h1 class="MyAdminH1">Add Block Booking</h1>
</div>

<div class="Mycontainer" style="background: white">

    <a>
        <button class="btn btn-danger UserList-btn">Check the Trainer ID</button>
    </a>

    <div id="UserDiv" class="Mycontainer" style="background: white; display:none; margin-bottom: 30px">
        <table id='UserList'>
            <thead>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <form id="block-book-form" class="form-horizontal" action="BlockBookingAction.php" role="form" method="post"
          enctype="multipart/form-data">
            <div class="form-group">
                <label for="EventNameText" class="col-sm-2 control-label">Event Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="EventNameText" name="EventName"
                           placeholder="Please input the Event Name">
                </div>
            </div>
            <div class="form-group">
                <label for="FacilityNameText" class="col-sm-2 control-label">Facility Name:</label>
                <div class="col-sm-10">
                    <select id="FacilityNameText" name="FacilityName" class="form-control">
                        <?php
                        $rows = getFacilityList();
                        $data_count = count($rows);
                        for ($i = 0; $i < $data_count; $i++) {
                            $Name = $rows[$i]['Name'];
                            echo "<option>$Name</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="UserIDText" class="col-sm-2 control-label">Trainer ID:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="UserIDText" name="UserID"
                           placeholder="Please input the Trainer ID">
                </div>
            </div>
            <div class="form-group">
                <label for="BlockStartTimeText" class="col-sm-2 control-label">Block Book Start Time:</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" id="BlockStartTimeText" name="BlockStartTime"
                           placeholder="Please input the Start Time">
                </div>
            </div>
            <div class="form-group">
                <label for="BlockBookEndTimeText" class="col-sm-2 control-label">Block Book End Time:</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" id="BlockBookEndTimeText" name="BlockBookEndTime"
                           placeholder="Please input the End Time">
                </div>
            </div>
            <div class="form-group">
                <label for="EventStarttimeText" class="col-sm-2 control-label">Event Start time:</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" id="EventStarttimeText" name="starttime">
                </div>
            </div>
            <div class="form-group">
                <label for="EventEndtimeText" class="col-sm-2 control-label">Event End time:</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" id="EventEndtimeText" name="endtime">
                </div>
            </div>
            <div class="form-group">
                <label for="DaysOfWeekText" class="col-sm-2 control-label">Days of Week:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="DaysOfWeekText" name="DaysOfWeek"
                           placeholder="For example if held on Sunday= 0, Monday = 1 .... Saturday=6">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="block-booking" class="btn btn-primary" value="Block Booking">
                </div>
            </div>
    </form>
</div>
</body>
<div class="footerpage">

</div>

<script>
    $(function () {
        $(".footerpage").load("footer.html");
    });
</script>
</html>
