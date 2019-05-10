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
            //服务器配置
            $mail->CharSet = "UTF-8";                     //设定邮件编码
            $mail->SMTPDebug = 0;                        // 调试模式输出
            $mail->isSMTP();                             // 使用SMTP
            $mail->Host = 'smtp.163.com';                // SMTP服务器
            $mail->SMTPAuth = true;                      // 允许 SMTP 认证
            $mail->Username = 'dugroup3';                // SMTP 用户名  即邮箱的用户名
            $mail->Password = 'jcyhlz666';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
            $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
            $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

            $mail->setFrom('dugroup3@163.com', 'Team3');  //发件人
            $mail->addAddress("$email", 'Customer');  // 收件人//$mail->addAddress('ellen@example.com');  // 可添加多个收件人
            $mail->addReplyTo("$email", 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致

            //Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = 'Booking Cancel';
            $mail->Body = "<h1>Booking Cancel</h1><p>Your booking from $Starttime to $Endtime in $FacilityName  has been cancel!!!!</p>";
            $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

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