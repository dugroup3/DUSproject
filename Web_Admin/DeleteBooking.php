<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-09
 * Time: 17:21
 */
require_once '../DataBase/database.php';
require_once('../Web_Basic_User/email.class.php');
$Bookingid = $_GET['BookingID'];
$UserID = $_GET['UserID'];
$UserName = SelectUserByID($UserID);
$UserName = $UserName['Username'];


//Get Booking Info
$row = SelectBookingByID($Bookingid);
$Starttime = $row['Starttime'];
$Endtime = $row['Endtime'];
$FacilityID = $row['FacilityID'];

$FacilityName = SelectFacility($FacilityID);
$FacilityName = $FacilityName['Name'];


if (!empty($Bookingid)) {
    //Delete the Booking information from database
    $statement=DeleteBooking($Bookingid);
    if($statement){

        //Defind user email.
        $email = $UserName;

        //##########################################
        $smtpserver = "smtp.163.com";//SMTP Server
        $smtpserverport = 25;//SMTP Server port
        $smtpusermail = "dugroup3@163.com";//SMTP email address
        $smtpemailto = $email;//Email to who
        $smtpuser = "dugroup3";//SMTP Server account
        $smtppass = "jcyhlz666";//SMTP Server Password
        $mailsubject = "Booking Cancel";//Email Subject
        $mailbody = "<h1>Booking Cancel</h1><p>Your booking from $Starttime to $Endtime in $FacilityName  has been cancel!!!!</p>";//Email body
        $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
        ##########################################
        $smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
        //$smtp->debug = true;//debug information
        $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
        echo "<script>alert('Cancel Booking success!');location.href='BookingManagement.php';</script>";
    }else{
        echo "<script>alert('Cancel Booking Fail');location.href='BookingManagement.php';</script>";
    }
} else {
    die("Booking id not define");
}
?>