
<?php
require_once '../DataBase/database.php';
$pdo= connectDBPDO();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$FacilityID=$_POST['FacilityID'];
$FacilityName=$_POST['FacilityName'];
$UserID=$_POST['UserID'];
$Username=$_POST['Username'];
$Starttime=$_POST['FacilityDate2']."T".$_POST['start'].":00:00";
$st=$_POST['start'].":00:00";
$Endtime=$_POST['FacilityDate2']."T".$_POST['end'].":00:00";
$et=$_POST['end'].":00:00";
$Totalcost=$_POST['Totalcost'];

if ($UserID) {
}else{
    ?>
    <script>

        alert('You are not logged in yet! please log in first.');

        window.location.href="LoginPage.php";
    </script>
    <?php


}

$result="1";

$bookingList=GetbookingByUserID($UserID);
foreach ($bookingList as $item) {
    $startTime = explode(' ', $item['Starttime']);
    $endTime = explode(' ', $item['Endtime']);
    if ($_POST['FacilityDate2'] == $startTime[0]) {
        if (($st <= $startTime[1] && $et >= $endTime[1]) || ($startTime[1] <= $st && $st < $endTime[1]) || ($startTime[1] < $et && $et <= $endTime[1])) {
            $result = "0";
            echo "<script> alert(\"You have another booking during this time, please check your booking calendar!\");
        location.href=\"index.php\";</script>";
        }

    }
}

if($FacilityID==17){
    for($i=$_POST['start'];$i<$_POST['end'];$i++){
        $bookingList=GetbookingByFacilityID($FacilityID);
        $number=0;
        foreach($bookingList as $item){
            $startTime = explode(' ',$item['Starttime']);
            $endTime = explode(' ',$item['Endtime']);
            if($_POST['FacilityDate2']==$startTime[0]){
                $j=$i+1;
                $s=explode(':',$startTime[1]);
                $e=explode(':',$endTime[1]);
                if($s[0]<=$i&&$j<=$e[0]){
                    $number++;
                    if($number>=20){
                        $result="0";
                        if($j<=10){
                        echo "<script> alert(\"$i:00:00 to 0$j:00:00 has been Booking full!\");
                        location.href=\"SearchFacility.php\";</script>";}
                        else{
                            echo "<script> alert(\"$i:00:00 to $j:00:00 has been Booking full!\");
                        location.href=\"SearchFacility.php\";</script>";}
                    }
                }
            }
        }
    }
}
else{
    $bookingList=GetbookingByFacilityID($FacilityID);
    foreach ($bookingList as $item){
        $startTime = explode(' ',$item['Starttime']);
        $endTime = explode(' ',$item['Endtime']);
        if($_POST['FacilityDate2']==$startTime[0]){
            if(($st<=$startTime[1]&&$et>=$endTime[1])||($startTime[1]<=$st&&$st<$endTime[1])||($startTime[1]<$et&&$et<=$endTime[1])){
                $result="0";
                echo "<script> alert(\"This time has already been booked!\");
        location.href=\"SearchFacility.php\";</script>";
            }

        }
    }
}


if($result=="1") {
    $statement = $pdo->query(
        "INSERT INTO Booking(FacilityID,UserID,Starttime,Endtime,Totalcost) VALUES ('$FacilityID','$UserID','$Starttime','$Endtime','$Totalcost')"
    );
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($statement) {
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
            $mail->addAddress("$Username", 'Customer');  //  Add address
            $mail->addReplyTo("$Username", 'info'); // who repley to
            //Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = 'Booking Confirm' . time();
            $mail->Body = "<h1>Booking Success</h1><p>Your booking time is From $Starttime to $Endtime in $FacilityName</p><p>The total prices is £ $Totalcost</p><p>For More detail https://www.teamdurham.com/</p>" . date('Y-m-d H:i:s');
            $mail->AltBody = "<h1>Booking Success</h1><p>Your booking time is From $Starttime to $Endtime in $FacilityName</p><p>The total prices is £ $Totalcost</p><p>For More detail https://www.teamdurham.com/</p>" . date('Y-m-d H:i:s');

            $mail->send();
            echo "<script>alert('Add Booking Success!!');location.href='index.php';</script>";
        } catch (Exception $e) {
            echo 'Sent email fail: ', $mail->ErrorInfo;
        }
        echo "<script>alert('Add Booking suc!! ');location.href='index.php';</script>";
    } else {
        echo "<script>alert('Add Booking Fail!! Please add again');location.href='index.php';</script>";
    }
}
?>
