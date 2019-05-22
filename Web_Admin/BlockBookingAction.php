<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-12
 * Time: 21:51
 */
require_once "../DataBase/database.php";
//Check the Post Data get from the add block booking form.

if (!isset($_POST['FacilityName'])) {
    die("Facility name not define.");
}

if (empty($_POST['EventName'])) {
    die("Event Name not define.");
}

if (empty($_POST['UserID'])) {
    die("UserID not define.");
}

if (empty($_POST['BlockStartTime'])) {
    die("Block Booking Start Time not define.");
}

if (empty($_POST['BlockBookEndTime'])) {
    die("Block Booking End Time not define.");
}

if (empty($_POST['starttime'])) {
    die("event start time not define.");
}
if (empty($_POST['endtime'])) {
    die("event end time not define.");
}

//Prevent the sql injection
$FacilityName = filter_input(INPUT_POST, 'FacilityName', FILTER_SANITIZE_STRING);
$EventName = filter_input(INPUT_POST, 'EventName', FILTER_SANITIZE_STRING);
$UserID = filter_input(INPUT_POST, 'UserID', FILTER_SANITIZE_STRING);
$BlockStartTime = filter_input(INPUT_POST, 'BlockStartTime', FILTER_SANITIZE_STRING);
$BlockBookEndTime = filter_input(INPUT_POST, 'BlockBookEndTime', FILTER_SANITIZE_STRING);
$starttime = filter_input(INPUT_POST, 'starttime', FILTER_SANITIZE_STRING);
$endtime = filter_input(INPUT_POST, 'endtime', FILTER_SANITIZE_STRING);
$DaysOfWeek = $_POST['DaysOfWeek'];



$DaysOfWeek=implode(',',$DaysOfWeek);


//1. Find the user by username check whether he has register.
$rows = SelectUserByID($UserID);
$Facilityrows = FindFacilityID($FacilityName);
if ($rows == 0) {
    die("This User have not register, Booking fail!!");
} else {
    //Get the Facility ID by Facility Name.
    $FacilityID = $Facilityrows["FacilityID"];
    //Insert the Booking Detail into Booking Table.
    $pdo = connectDBPDO();
    $sql = "INSERT INTO `Booking`(`FacilityID`, `UserID`, `Starttime`, `Endtime`, `Totalcost`) 
           VALUES ('$FacilityID','$UserID','$BlockStartTime','$BlockBookEndTime','0')";
    $statement = $pdo->query($sql);
    if($statement){
        //Get the Booking ID.
        $BookingID = $pdo->lastInsertId();
        //Add Event into database.
        $statement2 = AddEvent($EventName,$UserID,$FacilityID,$BookingID,$starttime,$endtime,$DaysOfWeek);
        if($statement2){
            echo "<script>alert('Add Block Booking Success!!');location.href='BlockBooking.php';</script>";
        }else{
            echo "<script>alert('Add Block Booking fail!! Please try again');location.href='BlockBooking.php';</script>";
        }
    }else{
        die("Create Block Booking Fail!");
    }

}

?>