<?php
require_once '../DataBase/database.php';
if (!empty($_GET['Username'])) {
    $Username = $_GET['Username'];
    //Search User info by Username in database.
    $rows = SelectAuser($Username);


} else {
    die('Username not define!');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modify Personal Information Page</title>
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

        <h2>Modify Personal Information Page</h2>
        <!--        Form Start-->
        <form class="form-horizontal" role="form" onsubmit="return check_form()" method="post">
            <div class="form-group">
                <label for="firstNameText" class="col-sm-2 control-label">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstNameText" name="firstName"
                           value="<?php echo $rows['Firstname'] ?>" placeholder="First Name">
                </div>
            </div>
            <div class="form-group">
                <label for="lastNameText" class="col-sm-2 control-label">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastNameText" name="lastName"
                           value="<?php echo $rows['Lastname'] ?>" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <label for="phoneText" class="col-sm-2 control-label">Phone number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phoneText" name="phone"
                           value="<?php echo $rows['Phone'] ?>" placeholder="Please input your Phone number">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="Confirm-info" class="btn btn-primary" value="Confirm">
                </div>
            </div>
        </form>
        <!--Form End-->

        <!--        If the form has been post-->
        <?php
        if (isset($_POST['Confirm-info'])) {
            //get the post data from the submit form.
            $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
            $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);

            echo $Username;
            if (empty($firstName)) {
                die("FirstName not define!!");
            }
            if (empty($lastName)) {
                die("LastName not define!!");
            }
            if (empty($phone)) {
                die("Phone not define!!");
            }

            $statement = UpdateUserInfo($Username, $firstName, $lastName, $phone);
            if ($statement) {
                echo "<script>alert('Update personal detail success!');location.href='Personalinfopage.php';</script>";
            } else {
                echo "<script>alert('Update personal detail fail, please try again');location.href='Personalinfopage.php';</script>";
            }

        }
        ?>
        <!--        Action end-->
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