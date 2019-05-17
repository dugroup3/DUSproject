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
    ?>
</div>
<div class="Mycontainer" style="background: #742e68; margin-top: 100px">
    <h1 class="MyAdminH1">Booking Management</h1>
</div>

<div class="Mycontainer" style="background: #742e68">
    <div class="col-sm-offset-10 col-sm-offset-10" style="margin-top: 10px">
        <a href="AddBooking.php">
            <button class="btn btn-primary btn-lg " value="Add Booking">Add Booking <i
                    class='glyphicon glyphicon-plus'></i></button>
        </a>
    </div>
    <table style="margin-top: 20px">
        <thead>
        <tr>
            <th scope="col">BookingID</th>
            <th scope="col">Facility Name</th>
            <th scope="col">User Name</th>
            <th scope="col">Booking time</th>
            <th scope="col">Total Cost</th>
            <th scope="col">Modify</th>
        </tr>
        </thead>
        <tbody>
        <!-- Show Booking List       -->
        <?php
        try {
            $rows = GetBookingList();
            $data_count = count($rows);
            for ($i = 0; $i < $data_count; $i++) {
                $BookingID = $rows[$i]['BookingID'];
                $FacilityID = $rows[$i]['FacilityID'];
                $UserID = $rows[$i]['UserID'];
                $Starttime = $rows[$i]['Starttime'];
                $Endtime = $rows[$i]['Endtime'];
                $Prices = $rows[$i]['Totalcost'];
                $Prices=sprintf("%.2f",$Prices);
                //Get Facility Name
                $FacilityName = SelectFacility($FacilityID);
                $FacilityName = $FacilityName['Name'];

                //Get User Name
                $UserName = SelectUserByID($UserID);
                $UserName = $UserName['Username'];


                echo "<tr>
                    <td data-label='BookingID'>$BookingID</td>
                    <td data-label='Facility Name'> $FacilityName</td>
                    <td data-label='User Name'> $UserName</td>
                    <td data-label='Booking time'><p style='font-size: 15px; color: black'> From:<br>  $Starttime <br> to <br>  $Endtime</p></td>
                    <td data-label='Total Cost'> £$Prices</td>";
                ?>
                <td data-label='Modify'>
                    <?php echo "<a href='DeleteBooking.php?BookingID=$BookingID&UserID=$UserID' onclick='return del()' style='margin-left: 10px'><input type='button' class='btn btn-danger' value='Delete'></a>" ?>
                </td>
                <?php
                echo "</tr>";

            }
        } catch (PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        ?>
        </tbody>
    </table>
</div>

</body>
<div class="footerpage">

</div>
<script>
    $(function () {
        $(".footerpage").load("footer.html");
    });
    //delete button method.
    function del() {
        var msg = "ARE YOU SURE DELETE THIS Booking？\n\nPLEASE CONFIRM！";
        if (confirm(msg)==true){
            return true;
        }else{
            return false;
        }
    }
</script>
</html>

