<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/bootstrap.css" rel="stylesheet"/>
    <link href="../public/css/style.css" rel="stylesheet"/>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" href="https://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
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
    <h1 class="MyAdminH1">Add Booking</h1>
</div>

<div class="Mycontainer" style="background: white">
    <a>
        <button class="btn btn-danger FacilityList-btn">Check the Facility Prices</button>
    </a>

    <div id="FacilityDiv" class="Mycontainer" style="background: white; display:none; margin-bottom: 30px">
        <table id='FacilityList'>
            <thead>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>


    <form id="add-facility-form" class="form-horizontal" action="AddBookingAction.php" role="form" method="post" enctype="multipart/form-data">
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
            <label for="UserNameText" class="col-sm-2 control-label">User Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="UserNameText" name="UserName"
                       placeholder="Please input the User Name">
            </div>
        </div>
        <div class="form-group">
            <label for="StartTimeText" class="col-sm-2 control-label">Booking Start Time:</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="StartTimeText" name="StartTime"
                       placeholder="Please input the Start Time">
            </div>
        </div>
        <div class="form-group">
            <label for="EndTimeText" class="col-sm-2 control-label">Booking End Time:</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="EndTimeText" name="EndTime"
                       placeholder="Please input the End Time">
            </div>
        </div>
        <div class="form-group">
            <label for="PricesText" class="col-sm-2 control-label">Total Prices:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="PricesText" name="Prices"
                       placeholder="Please input the Total prices">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="add-booking" class="btn btn-primary" value="Add Booking">
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
