<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-09
 * Time: 15:11
 */

require_once "../DataBase/database.php";
if (!isset($_POST['FacilityName'])) {
    die("Facility name not define.");
}

if (empty($_POST['UserName'])) {
    die("UserName not define.");
}

if (empty($_POST['StartTime'])) {
    die("Booking Start Time not define.");
}

if (empty($_POST['EndTime'])) {
    die("Booking End Time not define.");
}

if (empty($_POST['Prices'])) {
    die("Total Prices not define.");
}

$FacilityName = filter_input(INPUT_POST, 'FacilityName', FILTER_SANITIZE_STRING);
$UserName = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_STRING);
$StartTime = filter_input(INPUT_POST, 'StartTime', FILTER_SANITIZE_STRING);
$EndTime = filter_input(INPUT_POST, 'EndTime', FILTER_SANITIZE_STRING);
$Prices = filter_input(INPUT_POST, 'Prices', FILTER_SANITIZE_STRING);


//1. Find the user by username check whether he has register.
$rows = SelectAuser($UserName);
$Facilityrows = FindFacilityID($FacilityName);
if ($rows == 0) {
    die("This User have not register, Booking fail!!");
} else {
    $UserID = $rows["UserID"];
    $FacilityID = $Facilityrows["FacilityID"];


    //2. Check the Capacity
    $Capacity = $Facilityrows['Capacity'];
    //echo $Capacity;

    //Get the Total num of Booking
    $BookingCapacity = CheckBooking($StartTime,$EndTime);
    $BookingCapacity = $BookingCapacity['num'];
    //echo $BookingCapacity;

    //if have capacity left
    if($BookingCapacity<$Capacity){
        // if no error occured, continue ....
        $statement = AddBooking($FacilityID, $UserID, $StartTime, $EndTime, $Prices);
        if ($statement) {
            require_once('../Web_Basic_User/email.class.php');

            //Defind user email.
            $email = $UserName;

            //##########################################
            $smtpserver = "smtp.163.com";//SMTP Server
            $smtpserverport = 25;//SMTP Server port
            $smtpusermail = "dugroup3@163.com";//SMTP email address
            $smtpemailto = $email;//Email to who
            $smtpuser = "dugroup3";//SMTP Server account
            $smtppass = "jcyhlz666";//SMTP Server Password
            $mailsubject = "Booking Confirm";//Email Subject
            $mailbody = "<h1>Booking Success</h1><p>Your booking time is From $StartTime to $EndTime in $FacilityName</p><p>The total prices is £ $Prices</p><p>For More detail https://www.teamdurham.com/</p>";//Email body
            $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
            ##########################################
            $smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
            //$smtp->debug = true;//debug information
            $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
            echo "<script>alert('Add Booking success!');location.href='BookingManagement.php';</script>";
        } else {
            echo "<script>alert('Add Booking Fail!! Please add again');location.href='AddBooking.php';</script>";
        }
    }else{
        echo "<script>alert('Add Booking Fail!! this booking is exceed the capacity');location.href='AddBooking.php';</script>";
    }
}