<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SignUpPage</title>
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

        <h2>Sign Up page</h2>
        <!--        Form Start-->
        <form class="form-horizontal" role="form" action="signup.php" onsubmit="return check_form()" method="post">
            <div class="form-group">
                <label for="usernameText" class="col-sm-2 control-label">UserName:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="usernameText" name="userName"
                           placeholder="Please input your Email address" onblur="checkem()"><i id="email_i"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="passwordText" class="col-sm-2 control-label">PassWord:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordText" name="password"
                           placeholder="Please input your Password" onblur="checkpwd()"><i id="password_i"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="Confirm_passwordText" class="col-sm-2 control-label">Confirm PassWord:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="Confirm_passwordText" name="confirm_password"
                           placeholder="Please input your Password again" onblur="checkrpwd(passwordText,Confirm_passwordText)" ><i id="repeatpsw_i"></i>
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
                <label for="phoneText" class="col-sm-2 control-label">Phone number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phoneText" name="phone"
                           placeholder="Please input your Phone number">
                </div>
            </div>

            <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Identity:</label>
                <div class="col-sm-10">
                    <input type="radio" id="public" name="role" value="Public">Public &nbsp&nbsp&nbsp
                    <input type="radio" id="student" name="role" value="Student" checked="checked">Student &nbsp&nbsp&nbsp
                    <input type="radio" id="staff" name="role" value="Staff">Staff &nbsp&nbsp&nbsp
                    <input type="radio" id="trainer" name="role" value="Trainer">Trainer
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
<script>
    //Check email regular expression when registering
    function checkem() {
        var infem = document.getElementById('usernameText');
        var infem_i = document.getElementById('email_i');
        val = infem.value;
        if (/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(val)) {
            infem_i.innerHTML = "";
            return true;
        } else {
            infem_i.innerHTML = "   Please enter a valid email address! ";
            return false;
        }
    }
    //Check the length of password
    function checkpwd() {
        var infpwd = document.getElementById('passwordText');
        var infpwd_i = document.getElementById('password_i');
        val = infpwd.value;
        console.log(val === '')
        if (val === '') {
            infpwd_i.innerHTML = "   Please input password！ ";
            return false;
        }
        if (val.length < 6) {
            infpwd_i.innerHTML = "   Password must include minimum 6 characters！";
            return false;
        } else {
            infpwd_i.innerHTML = "You can use this password!";
            return true;
        }
    }
    //Check if the passwords entered twice are the same
    function checkrpwd() {
        var infpwd = document.getElementById('passwordText');
        val1 = infpwd.value;
        var infrepwd = document.getElementById('Confirm_passwordText');
        val2 = infrepwd.value;
        var repeatpsw_i = document.getElementById('repeatpsw_i');
        if (val2 === '') {
            repeatpsw_i.innerHTML = " Please confirm password！";
            return false;
        }
        if (val1 !== val2) {
            repeatpsw_i.innerHTML = " The two passwords you entered were inconsistent！";
            return false;
        } else {
            repeatpsw_i.innerHTML = " Please remember your password！";
            return true;
        }
    }

    function $(id) {
        return document.getElementById(id);
    }
</script>
</html>