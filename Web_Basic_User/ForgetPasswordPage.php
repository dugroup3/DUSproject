<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Password Recovery Page</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link href="../public/css/style.css" rel="stylesheet">
    <!--JS-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script>
        function check_ForgetPassword_form() {
            var username = document.getElementById("UsernameText").value;


            var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"); //Verify the email address



            if (!reg.test(username)) {
                alert("Please input the right email address!!");
                return false;
            }


            return true;

        }
    </script>
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

        <h2>Password Recovery Page</h2>
        <form class="form-horizontal" role="form" action="Sent_email_FPW.php" onsubmit="return check_ForgetPassword_form()"
              method="post">
            <div class="form-group">
                <label for="UsernameText" class="col-sm-2 control-label">User Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="UsernameText" name="userName"
                           placeholder="Please input your UserName">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
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
