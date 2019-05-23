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
    <h1 class="MyAdminH1">Facility Management</h1>
</div>

<div class="Mycontainer" style="background: #742e68">
    <div class="col-sm-offset-10 col-sm-offset-10" style="margin-top: 10px">
        <a href="AddFacility.php">
            <button class="btn btn-primary btn-lg " value="Add Facility">Add Facility <i
                        class='glyphicon glyphicon-plus'></i></button>
        </a>
    </div>
    <table style="margin-top: 20px">
        <thead>
        <tr>
            <th scope="col">FacilityID</th>
            <th scope="col">Name</th>
            <th scope="col">Open Time</th>
            <th scope="col">Close Time</th>
            <th scope="col">Capacity</th>
            <th scope="col">Picture</th>
            <th scope="col">Prices</th>
            <th scope="col">Status</th>
            <th scope="col">Modify</th>
        </tr>
        </thead>
        <tbody>
        <!-- Show Facility List       -->
        <?php
        try {
            $rows = getFacilityList();
            $data_count = count($rows);
            for ($i = 0; $i < $data_count; $i++) {
                $ID = $rows[$i]['FacilityID'];
                $Name = $rows[$i]['Name'];
                $Opentime = $rows[$i]['Opentime'];
                $Closetime = $rows[$i]['Closetime'];
                $Capacity = $rows[$i]['Capacity'];
                $Picture = $rows[$i]['Picture'];
                $Prices = $rows[$i]['Prices'];
                $Status = $rows[$i]['Status'];
                $PictureAddress = "../public/img/" . $Picture;
                echo "<tr>
                    <td data-label='FacilityID'>$ID</td>
                    <td data-label='Name'> $Name</td>
                    <td data-label='Opentime'> $Opentime</td>
                    <td data-label='Closetime'> $Closetime</td>
                    <td data-label='Capacity'> $Capacity</td>";
                ?>
                <td data-label="Picture"><img
                            src="<?php echo $PictureAddress ?>" style="width: 100px;height: 100px">
                </td>
                <td data-label='Prices'>
                    <?php
                    echo "£".$Prices."per hour";
                    ?>
                </td>
                <td data-label='Status'>
                    <?php
                    if ($Status == 0) {
                        echo "Available";
                    } else {
                        echo "Unavailable";
                    }
                    ?>
                </td>
                <td data-label='Modify'>
                    <?php echo "<a href='EditFacility.php?FacilityID=$ID'><input type='button' class='btn btn-default' value='Edit'></a>" ?>
                    <?php echo "<a href='DeleteFacility.php?FacilityID=$ID' onclick='return del()' style='margin-left: 10px'><input type='button' class='btn btn-danger' value='Delete'></a>" ?>
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
        var msg = "ARE YOU SURE DELETE THIS FACILITY？\n\nPLEASE CONFIRM！";
        if (confirm(msg)==true){
            return true;
        }else{
            return false;
        }
    }
</script>
</html>

