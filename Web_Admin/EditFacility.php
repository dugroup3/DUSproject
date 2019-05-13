<?php
require_once '../DataBase/database.php';
if (!empty($_GET['FacilityID'])) {
    $FacilityID = intval($_GET['FacilityID']);
    //Search Facility info by facility id in database.
    $rows = SelectFacility($FacilityID);

} else {
    die('Facility ID not define!');
}
?>
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
    <h1 class="MyAdminH1">Edit Facility</h1>
</div>
<div class="col-sm-offset-2 col-sm-offset-2" style="margin-top: 10px">
    <a href="FacilityManagement.php">
        <button class="btn btn-primary btn-lg " value="Back"><i class='glyphicon glyphicon-chevron-left'></i> Back
        </button>
    </a>
</div>
<div class="Mycontainer" style="background: white">
    <form id="add-facility-form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="FacilityNameText" class="col-sm-2 control-label">Facility Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="FacilityNameText" name="FacilityName"
                       value="<?php echo $rows['Name'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="OpenTimeText" class="col-sm-2 control-label">Open Time:</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" id="OpenTimeText" name="OpenTime"
                       value="<?php echo $rows['Opentime'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="CloseTimeText" class="col-sm-2 control-label">Close Time:</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" id="CloseTimeText" name="CloseTime"
                       value="<?php echo $rows['Closetime'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="DescriptionText" class="col-sm-2 control-label">Description:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="DescriptionText" name="Description"
                       value="<?php echo $rows['Description'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="CapacityText" class="col-sm-2 control-label">Capacity:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="CapacityText" name="Capacity"
                       value="<?php echo $rows['Capacity'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="Picturebox" class="col-sm-2 control-label">Picture:</label>
            <div class="col-sm-10">
                <img src="../public/img/<?php echo $rows['Picture'] ?>" style="height: 100px;height: 100px">
                <input type="file" class="form-control" id="Picturebox" name="Fimage">
            </div>
        </div>
        <div class="form-group">
            <label for="PricesText" class="col-sm-2 control-label">Prices:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="PricesText" name="Prices"
                       value="<?php echo $rows['Prices'] ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="update-facility" class="btn btn-primary" value="Update Facility">
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['update-facility'])) {
        $FacilityName = $_POST['FacilityName'];// FacilityName
        $OpenTime = $_POST['OpenTime'];// OpenTime
        $CloseTime = $_POST['CloseTime'];// CloseTime
        $Description = $_POST['Description'];// Description
        $Capacity = $_POST['Capacity'];// Capacity
        $Prices = $_POST['Prices'];// Prices
        $imgFile = $_FILES['Fimage']['name'];
        $tmp_dir = $_FILES['Fimage']['tmp_name'];
        $imgSize = $_FILES['Fimage']['size'];
        //Get old img address.
        $oldimg = "../public/img/" . $rows['Picture'];
        if (empty($FacilityName)) {
            die("Please Enter FacilityName.");
        } else if (empty($OpenTime)) {
            die("Please Enter Open Time.");
        } else if (empty($CloseTime)) {
            die("Please Enter Close Time.");
        } else if (empty($Capacity)) {
            die("Please Enter Capacity.");
        } else if (empty($Capacity)) {
            die("Please Enter Capacity.");
        } else if (empty($imgFile)) {
            $statement = EditFacilityInfo($FacilityID, $FacilityName, $OpenTime, $CloseTime, $Description, $Capacity, $Prices);
            if ($statement) {
                echo "<script>alert('Update Facility info success!');location.href='FacilityManagement.php';</script>";
            } else {
                echo "<script>alert('Update Facility Fail!! Please add again');location.href='FacilityManagement.php';</script>";
            }
        } else {
            $upload_dir = '../public/img/' . basename($_FILES['Fimage']['name']); // upload directory

            $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // allow valid image file formats
            if (in_array($imgExt, $valid_extensions)) {
                // Check file size '5MB'
                if ($imgSize < 5000000) {
                    move_uploaded_file($tmp_dir, $upload_dir);
                } else {
                    die("Sorry, your file is too large.");
                }
            } else {
                die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }
            // if no error occured, continue ....
            $statement = UpdateFacilityInfo($FacilityID, $FacilityName, $OpenTime, $CloseTime, $Description, $Capacity, $imgFile, $Prices);
            if ($statement) {
                unlink($oldimg);
                echo "<script>alert('Update Facility info success!');location.href='FacilityManagement.php';</script>";
            } else {
                echo "<script>alert('Update Facility Fail!! Please add again');location.href='FacilityManagement.php';</script>";
            }
        }

    }
    ?>
</div>

</body>
<div class="footerpage">

</div>
<script>
    $(function () {
        $(".footerpage").load("footer.html");
    });

    //Show the preview photo
    $('#Picturebox').change(function () {
        var $file = $(this);
        var fileObj = $file[0];
        var windowURL = window.URL || window.webkitURL;
        var dataURL;
        var $img = $("img");
        if (fileObj && fileObj.files && fileObj.files[0]) {
            dataURL = windowURL.createObjectURL(fileObj.files[0]);
            $img.attr('src', dataURL);
        } else {
            dataURL = $file.val();
            var imgObj = document.getElementById("preview");
            imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
            imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
        }
    });
</script>
</html>