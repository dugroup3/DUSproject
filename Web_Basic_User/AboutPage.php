<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link href="../public/css/style.css" rel="stylesheet">
    <!--JS-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
        <div id="demo" class="carousel slide" data-ride="carousel">


            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

<!--            Picture part-->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../public/img/Slide1.1.jpg" style="width: 50%; height: 50%">
                </div>
                <div class="carousel-item">
                    <img src="../public/img/Slide2.jpg" style="width: 50%; height: 50%">
                </div>
                <div class="carousel-item">
                    <img src="../public/img/Britainslargestparticipation.jpg" style="width: 50%; height: 50%">
                </div>
            </div>

<!--            prev next button-->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

        <h2>About Us</h2>
        
            <div class="about-facilities">
           </br>    
           <p> This new 'Facilities' section is predicted to be a part of DUS web site. A set of web pages are provided here to demonstrate to users a robust software that can operate well on a variety of screen sizes and devices, including mobile phones. The hight lights of the new system are a calendar-view of events and an on-line booking system.  </p>
		   
		   </div>
		   <h3>Development Team</h3>
		   <div class="about-members" style="color:grey"> 
		   <p>The development team is a group of students in MSc Internet Systems and E-business at Durham University(18/19).If you have any problem, please do not hesitate to contact any of us：</p>  <ol> <li>tingran.bian@durham.ac.uk </li><li>chiying.jiang@durham.ac.uk </li><li> xiaohe.lu@durham.ac.uk </li><li>lin.yang@durham.ac.uk </li><li>zixin.zhang@durham.ac.uk</li>  </ol> 
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