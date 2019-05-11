<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-09
 * Time: 15:11
 */

require_once "../DataBase/database.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
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
    $BookingCapacity = CheckBooking($StartTime, $EndTime);
    $BookingCapacity = $BookingCapacity['num'];
    //echo $BookingCapacity;

    //if have capacity left
    if ($BookingCapacity < $Capacity) {
        // if no error occured, continue ....
        $statement = AddBooking($FacilityID, $UserID, $StartTime, $EndTime, $Prices);
        if ($statement) {

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
                $mail->addAddress("$UserName", 'Customer');  //  Add address
                $mail->addReplyTo("$UserName", 'info'); // who repley to

                //Content
                $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
                $mail->Subject = 'Booking Confirm' . time();
                $mail->Body = "<h1>Booking Success</h1><p>Your booking time is From $StartTime to $EndTime in $FacilityName</p><p>The total prices is £ $Prices</p><p>For More detail https://www.teamdurham.com/</p>" . date('Y-m-d H:i:s');
                $mail->AltBody = "<h1>Booking Success</h1><p>Your booking time is From $StartTime to $EndTime in $FacilityName</p><p>The total prices is £ $Prices</p><p>For More detail https://www.teamdurham.com/</p>" . date('Y-m-d H:i:s');

                $mail->send();
                echo "<script>alert('Add Booking Success!!');location.href='BookingManagement.php';</script>";
            } catch (Exception $e) {
                echo 'Sent email fail: ', $mail->ErrorInfo;
            }
        } else {
            echo "<script>alert('Add Booking Fail!! Please add again');location.href='AddBooking.php';</script>";
        }
    } else {
        echo "<script>alert('Add Booking Fail!! this booking is exceed the capacity');location.href='AddBooking.php';</script>";
    }
}