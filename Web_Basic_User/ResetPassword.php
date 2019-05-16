<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password Page</title>
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

        <h2>Reset Password page</h2>
        <!--        Form Start-->
        <form class="form-horizontal" role="form" onsubmit="return check_Modify_password_form()" method="post">
            <div class="form-group">
                <label for="emailcodeText" class="col-sm-2 control-label">Verification code:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="emailcodeText" name="emailcode"
                           placeholder="Please input your Verification code">
                </div>
            </div>
            <div class="form-group">
                <label for="passwordText" class="col-sm-2 control-label">New PassWord:</label>
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
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="reset-password" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
        <!--Form End-->
        <!--        Once the form has been submit-->
        <?php
        require_once '../DataBase/database.php';
        if (isset($_POST['reset-password'])) {
            //get the post data from the submit form.
            $code = $_POST['emailcode'];
            $password = $_POST['password'];
            $comfirm_password = $_POST['confirm_password'];
            $Comparecode = $_SESSION['code'];
            $username = $_SESSION['email'];

            if (empty($code)) {
                die("Code not define!!");
            }
            if (empty($password)) {
                die("New Password not define!!");
            }
            if (empty($username)) {
                die("Session out of date please try again!!");
            }
            if ($password != $comfirm_password) {
                echo "<script>alert('Reset fail, confirm password is not match the reset password');location.href='ForgetPasswordPage.php';</script>";
            } else {


                //Hash the password.
                $salt = "shuaige";
                $password_hash = $password . $salt;
                $password_hash = password_hash($password_hash, PASSWORD_DEFAULT);

                if ($code == $Comparecode) {
                    // if no error occured, continue ....
                    $statement = ResetPassword($username, $password_hash);
                    if ($statement) {
                        echo "<script>alert('Reset password success!');location.href='LoginPage.php';</script>";
                    } else {
                        echo "<script>alert('Reset fail, please try again');location.href='ForgetPasswordPage.php';</script>";
                    }

                }else{
                    echo "<script>alert('Reset fail, please enter the correct verification code');location.href='ForgetPasswordPage.php';</script>";
                }
            }
        }
        ?>
        <!--        end-->
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