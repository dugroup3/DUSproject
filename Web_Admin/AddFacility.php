<?php
require_once '../DataBase/database.php';
if (isset($_POST['add-facility'])) {
    $FacilityName = $_POST['FacilityName'];// FacilityName
    $OpenTime = $_POST['OpenTime'];// OpenTime
    $CloseTime = $_POST['CloseTime'];// CloseTime
    $Description = $_POST['Description'];// Description
    $Capacity = $_POST['Capacity'];// Capacity
    $Prices = $_POST['Prices'];// Prices
    $imgFile = $_FILES['Fimage']['name'];
    $tmp_dir = $_FILES['Fimage']['tmp_name'];
    $imgSize = $_FILES['Fimage']['size'];

//    echo $FacilityName."<br>";
//    echo $OpenTime."<br>";
//    echo $CloseTime."<br>";
//    echo $Description."<br>";
//    echo $Capacity."<br>";
//    echo $Prices."<br>";
//    echo $imgFile."<br>";
//    echo $tmp_dir."<br>";
//    echo $imgSize."<br>";
//    die();


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
        die("Please Select Image File.");
    } else {
        $upload_dir = '../public/img/'.basename($_FILES['Fimage']['name']); // upload directory

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
    }
    // if no error occured, continue ....
    $statement= AddFacility($FacilityName,$OpenTime,$CloseTime,$Description,$Capacity,$imgFile,$Prices);
    if($statement){
        echo "<script>alert('Add Facility success!');location.href='FacilityManagement.php';</script>";
    }else{
        echo "<script>alert('Add Facility Fail!! Please add again');location.href='AddFacility.php';</script>";
    }
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
    <link rel="stylesheet" href="https://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
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
    <h1 class="MyAdminH1">Add Facility</h1>
</div>

<div class="Mycontainer" style="background: white">
    <form id="add-facility-form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="FacilityNameText" class="col-sm-2 control-label">Facility Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="FacilityNameText" name="FacilityName"
                       placeholder="Please input the Facility Name">
            </div>
        </div>
        <div class="form-group">
            <label for="OpenTimeText" class="col-sm-2 control-label">Open Time:</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" id="OpenTimeText" name="OpenTime"
                       placeholder="Please input the Open Time">
            </div>
        </div>
        <div class="form-group">
            <label for="CloseTimeText" class="col-sm-2 control-label">Close Time:</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" id="CloseTimeText" name="CloseTime"
                       placeholder="Please input the Close Time">
            </div>
        </div>
        <div class="form-group">
            <label for="DescriptionText" class="col-sm-2 control-label">Description:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="DescriptionText" name="Description"
                       placeholder="Please input any description such as address, contact detail">
            </div>
        </div>
        <div class="form-group">
            <label for="CapacityText" class="col-sm-2 control-label">Capacity:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="CapacityText" name="Capacity"
                       placeholder="Please input the capacity of this facility">
            </div>
        </div>
        <div class="form-group">
            <label for="Picturebox" class="col-sm-2 control-label">Picture:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="Picturebox" name="Fimage">
            </div>
        </div>
        <div class="form-group">
            <label for="PricesText" class="col-sm-2 control-label">Prices:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="PricesText" name="Prices">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="add-facility" class="btn btn-primary" value="Add Facility">
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

