<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us</title>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link href="../public/css/style.css" rel="stylesheet">
    <!--JS-->
    <script src="../public/js/script.js"></script>
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
        <div class="row">
            <div class="col-md-6">
                <h4>How to book facilities?</h4>
                <h5>Step1:</h5>
                <p>If you already have an account, please login. Or you need to register on our website first. </p>
            </div>
            <div class="col-md-6">
                <img src="../public/img/step1.jpg" style="width:40%; max-width:200px;height:auto;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Step2:</h5>
                <p>In Facility page, you can search facilities and get more information. </p>
            </div>
            <div class="col-md-6">
                <img src="../public/img/step2.jpg" style="height:40%;max-width:200px;height:auto;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Step3:</h5>
                <p>Using the booking button to next page, you can see the bookings from other users and add a new booking on the calendar. </p>
            </div>
            <div class="col-md-6">
                <img src="../public/img/step3.jpg" style="height:30%;max-width:200px;height:auto;">-->
                <img src="../public/img/step4.jpg" style="height:130px;max-width:200px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Step4:</h5>
                <p>You can view all your reservations and all blocked events on the homepage.</p>
            </div>
            <div class="col-md-6">
                <img src="../public/img/step5.jpg" style="height:40%;max-width:200px;height:auto;">
            </div>
        </div>
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