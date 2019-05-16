<?php
session_start();
require_once('email.class.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require_once '../DataBase/database.php';


$email = $_POST['userName'];

$row=SelectAuser($email);

if($row==0){
    echo "<script>alert('You have not register in our website');location.href='SignUpPage.php';</script>";
}else {

    $arr = array_merge(range('a', 'b'), range('A', 'B'), range('0', '9'));
    shuffle($arr);
    $arr = array_flip($arr);
    $arr = array_rand($arr, 4);
    $res = '';
    foreach ($arr as $v) {
        $res .= $v;
    }

    $_SESSION['code'] = $res;
    $_SESSION['email'] = $email;


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server configure
        $mail->CharSet = "UTF-8";                     //Set Email compile code

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
        $mail->isHTML(true);
        $mail->Subject = 'Password Recovery' . time();
        $mail->Body = "<p><strong>Your code is $res</strong></p>" . date('Y-m-d H:i:s');
        $mail->AltBody = '<p><strong>Your code is $res</strong></p>';

        $mail->send();
        echo "<script>alert('We have sent you an Pass Word Recovery email');location.href='ResetPassword.php';</script>";
    } catch (Exception $e) {
        echo 'Sent email fail: ', $mail->ErrorInfo;
    }
}
?>