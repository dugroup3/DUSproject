<?php
session_start();
require_once('email.class.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';


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

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //服务器配置
    $mail->CharSet ="UTF-8";                     //设定邮件编码
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
    $mail->Subject = 'Password Recovery' . time();
    $mail->Body    = "<p><strong>Your code is $res</strong></p>" . date('Y-m-d H:i:s');
    $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

    $mail->send();
    echo "<script>alert('We have sent you an email');location.href='ResetPassword.php';</script>";
} catch (Exception $e) {
    echo 'Sent email fail: ', $mail->ErrorInfo;
}
?>