<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-09
 * Time: 17:21
 */
require_once '../DataBase/database.php';
require_once('../Web_Basic_User/email.class.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';


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
    $statement = DeleteBooking($Bookingid);
    if ($statement) {

        //Defind user email.
        $email = $UserName;

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server configure
            $mail->CharSet ="UTF-8";                     //Set Email compile code

            $mail->isSMTP();
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "tls://smtp.gmail.com";
            $mail->Port = 587; // or 587
            $mail->IsHTML(true);
            $mail->Username = "a604722853@gmail.com";
            $mail->Password = "jrhopaunxnzeerha";

            $mail->setFrom('a604722853@gmail.com', 'Team3');  //Who send Email
            $mail->addAddress("$email", 'Customer');  //  Add address
            $mail->addReplyTo("$email", 'info'); // who repley to

            //Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = 'Booking Cancel';
            $mail->Body = "<h1>Booking Cancel</h1><p>Your booking from $Starttime to $Endtime in $FacilityName  has been cancel!!!!</p>";
            $mail->AltBody = "<h1>Booking Cancel</h1><p>Your booking from $Starttime to $Endtime in $FacilityName  has been cancel!!!!</p>";

            $mail->send();
            echo "<script>alert('Cancel Booking Success!!');location.href='BookingManagement.php';</script>";
        } catch (Exception $e) {
            echo 'Sent email fail: ', $mail->ErrorInfo;
        }
    } else {
        echo "<script>alert('Cancel Booking Fail');location.href='BookingManagement.php';</script>";
    }
} else {
    die("Booking id not define");
}
?>