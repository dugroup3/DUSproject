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
    <h1 class="MyAdminH1">Admin Page</h1>
</div>
<div class="Mycontainer" style="background: black">
    <p>Welcome black <?php echo $_SESSION['User']['Firstname'] ?></p>
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

