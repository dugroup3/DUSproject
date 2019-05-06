<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>test</title>
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

        <h2>Sign Up page</h2>
<!--        Form Start-->
        <form class="form-horizontal" role="form" action="signup.php" onsubmit="return check_form()" method="post">
            <div class="form-group">
                <label for="usernameText" class="col-sm-2 control-label">UserName:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="usernameText" name="userName"
                           placeholder="Please input your UserName">
                </div>
            </div>
            <div class="form-group">
                <label for="passwordText" class="col-sm-2 control-label">PassWord:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordText" name="password"
                           placeholder="Please input your Password">
                </div>
            </div>
            <div class="form-group">
                <label for="Confirm_passwordText" class="col-sm-2 control-label">Confirm PassWord:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="Confirm_passwordText" name="confirm_password"
                           placeholder="Please input your Password again">
                </div>
            </div>
            <div class="form-group">
                <label for="firstNameText" class="col-sm-2 control-label">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstNameText" name="firstName"
                           placeholder="First Name">
                </div>
            </div>
            <div class="form-group">
                <label for="lastNameText" class="col-sm-2 control-label">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastNameText" name="lastName"
                           placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Register">
                </div>
            </div>
        </form>
<!--Form End-->
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