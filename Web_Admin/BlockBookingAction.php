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

//echo $FacilityName."<br>";
//echo $EventName."<br>";
//echo $UserID."<br>";
//echo $BlockStartTime."<br>";
//echo $BlockBookEndTime."<br>";
//echo $starttime."<br>";
//echo $endtime."<br>";


//1. Find the user by username check whether he has register.
$rows = SelectUserByID($UserID);
$Facilityrows = FindFacilityID($FacilityName);
if ($rows == 0) {
    die("This User have not register, Booking fail!!");
} else {
    $FacilityID = $Facilityrows["FacilityID"];
    $statement = AddBooking($FacilityID, $UserID, $BlockStartTime, $BlockBookEndTime, 0);
}

?>