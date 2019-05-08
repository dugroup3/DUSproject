<?php
session_start();
require_once('email.class.php');

$email = $_POST['userName'];

$arr = array_merge(range('a', 'b'), range('A', 'B'), range('0', '9'));
shuffle($arr);
$arr = array_flip($arr);
$arr = array_rand($arr, 4);
$res = '';
foreach ($arr as $v) {
    $res .= $v;
}

$_SESSION['code'] = $res;
$_SESSION['email']=$email;

//##########################################
$smtpserver = "smtp.163.com";//SMTP Server
$smtpserverport = 25;//SMTP Server port
$smtpusermail = "dugroup3@163.com";//SMTP email address
$smtpemailto = $email;//Email to who
$smtpuser = "dugroup3";//SMTP Server account
$smtppass = "jcyhlz666";//SMTP Server Password
$mailsubject = "Password Recovery";//Email Subject
$mailbody = "<h1>Your code is $res</h1>";//Email body
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
##########################################
$smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
//$smtp->debug = true;//debug information
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

echo "<script>alert('We have sent you an email');location.href='ResetPassword.php';</script>";
?>