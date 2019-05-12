<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-12
 * Time: 15:32
 */
require_once '../DataBase/database.php';

//Get Booking ID and Event ID from Url.
$BookingID = $_GET['BookingID'];
$EventID = $_GET['EventID'];


if (!empty($BookingID)&&!empty($EventID)) {
    //Delete the Block Booking information from database
    $statement=DeleteBooking($BookingID);
    $statement2=DeleteEvent($EventID);

    if($statement&&$statement2){
        header("Location:BlockBooking.php");
    }

} else {
    die("Booking id and Event ID not define");
}
?>