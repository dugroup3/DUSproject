<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Personal Information</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link href="../public/css/style.css" rel="stylesheet">
    <!--JS-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
        <h2>Your Personal Information</h2>
        <div style="margin-top: 20px">
            <ul>
                <?php
                require_once '../DataBase/database.php';
                $Username = $_SESSION['User']['Username'];
                try {
                    $rows = SelectAuser($Username);
                    $Username = $rows['Username'];
                    $Firstname = $rows['Firstname'];
                    $Lastname = $rows['Lastname'];
                    $Phone = $rows['Phone'];
                    $hidephone =  + substr($Phone, 0,3)."****".substr($Phone,7,3);
                    echo "<h4 style='margin-top: 20px'>Email : </h4><li>$Username</li>";
                    echo "<h4 style='margin-top: 20px'>Your name : </h4><li style='text-transform: uppercase'>$Firstname $Lastname</li>";
                    echo "<h4 style='margin-top: 20px'>Your Phone Num : </h4><li>$hidephone</li>";

                } catch (PDOException $e) {
                    die ("Error!: " . $e->getMessage() . "<br/>");
                }
                ?>
            </ul>
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo"<a href='ModifyPersonalinfo.php?Username=$Username'>"?>
                    <button class="btn btn-primary">Modify your personal information</button>
                </a>
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