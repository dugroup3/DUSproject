<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-03-11
 * Time: 17:31
 */

function connectDBPDO()
{
    $dbms = 'mysql';     //Data base type
    $dbName = 'dbtest';
    $host = 'dbtest.ce12oaotat2e.eu-west-2.rds.amazonaws.com';
    $user = 'root';
    $pass = '12341234';
    $dsn = "$dbms:host=$host;dbname=$dbName";
    $dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    return $dbh;
}


//Check Admin Session
function checkAdmin()
{
    if ($_SESSION['User']['Role'] != "Admin") {
        die("You are not Admin. Entry forbidden！");
    }
}


//Get the staff List Test
function getStaffList()
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM staff";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchALL(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Add Facility
function AddFacility($FacilityName, $Opentime, $CloseTime, $Description, $Capacity, $Picture, $Prices)
{
    $dbh = connectDBPDO();
    $sql = "INSERT INTO `Facility`(`Name`, `Opentime`, `Closetime`, `Description`, `Capacity`, `Picture`, `Prices`,`Status`) 
           VALUES ('$FacilityName','$Opentime','$CloseTime','$Description','$Capacity','$Picture','$Prices','0')";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Get Facility list Method
function getFacilityList()
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Facility`";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Delete Facility
function DeleteFacility($FacilityID)
{
    $dbh = connectDBPDO();
    $sql = "DELETE FROM `Facility` WHERE `FacilityID`=$FacilityID";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Select facility by id
function SelectFacility($FacilityID)
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Facility` WHERE `FacilityID`=$FacilityID";
    $statement = $dbh->query($sql);
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Update Facility info without piture
function EditFacilityInfo($FacilityID, $FacilityName, $Opentime, $CloseTime, $Description, $Capacity, $Prices)
{
    $dbh = connectDBPDO();
    $sql = "UPDATE `Facility` SET `Name`='$FacilityName',`Opentime`='$Opentime',`Closetime`='$CloseTime',`Description`='$Description',`Capacity`='$Capacity',`Prices`='$Prices' WHERE FacilityID=$FacilityID";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Update Facility info with piture
function UpdateFacilityInfo($FacilityID, $FacilityName, $Opentime, $CloseTime, $Description, $Capacity, $Picture, $Prices)
{
    $dbh = connectDBPDO();
    $sql = "UPDATE `Facility` SET `Name`='$FacilityName',`Opentime`='$Opentime',`Closetime`='$CloseTime',`Description`='$Description',`Capacity`='$Capacity',`Picture`='$Picture',`Prices`='$Prices' WHERE FacilityID=$FacilityID";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Reset password
function ResetPassword($Username,$Password)
{
    $dbh = connectDBPDO();
    $sql = "UPDATE `User` SET `Password`='$Password' WHERE Username='$Username'";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Seletct A User
function SelectAuser($Username)
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `User` WHERE Username='$Username'";
    $statement = $dbh->query($sql);
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Updata User Information
function UpdateUserInfo($Username,$Firstname,$Lastname,$Phone)
{
    $dbh = connectDBPDO();
    $sql = "UPDATE `User` SET `Firstname`='$Firstname',`Lastname`='$Lastname',`Phone`='$Phone' WHERE Username='$Username'";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Find the facility ID
function FindFacilityID($FacilityName)
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Facility` WHERE Name='$FacilityName'";
    $statement = $dbh->query($sql);
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//BOOKING PART
//Add Booking
function AddBooking($FacilityID, $UserID, $Starttime, $Endtime, $Totalcost)
{
    $dbh = connectDBPDO();
    $sql = "INSERT INTO `Booking`(`FacilityID`, `UserID`, `Starttime`, `Endtime`, `Totalcost`) 
           VALUES ('$FacilityID','$UserID','$Starttime','$Endtime','$Totalcost')";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Check whether the booking meet the  capacity
function CheckBooking($FacilityID,$StartTime,$Endtime){
    $dbh = connectDBPDO();
    $sql = "SELECT COUNT(BookingID) as num FROM Booking WHERE FacilityID='$FacilityID' AND Starttime>='$StartTime' AND Endtime<='$Endtime'";
    $statement = $dbh->query($sql);
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Get the Booking List
function GetBookingList(){
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Booking`";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Select User by id
function SelectUserByID($UserID)
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `User` WHERE `UserID`=$UserID";
    $statement = $dbh->query($sql);
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Delete Booking
function DeleteBooking($BookingID)
{
    $dbh = connectDBPDO();
    $sql = "DELETE FROM `Booking` WHERE `BookingID`=$BookingID";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Select Booking by id
function SelectBookingByID($BookingID)
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Booking` WHERE `BookingID`=$BookingID";
    $statement = $dbh->query($sql);
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Block Booking Part SQL

//Get the Trainer List
function getTrainerList()
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `User` WHERE `Role`='Trainer'";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Add Event
function AddEvent($Eventname,$UserID,$FacilityID,$BookingID,$EventStartTime,$EventEndTime,$DaysOfWeek){
    $dbh = connectDBPDO();
    $sql = "INSERT INTO `Event`(`Eventname`,`UserID`,`FacilityID`, `BookingID`,`EventStartTime`, `EventEndTime`, `DaysOfWeek`) 
           VALUES ('$Eventname','$UserID','$FacilityID','$BookingID','$EventStartTime','$EventEndTime','$DaysOfWeek')";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//Get the Block Booking list
function GetBlockBookingList(){
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Event`";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Delete Event
function DeleteEvent($EventID)
{
    $dbh = connectDBPDO();
    $sql = "DELETE FROM `Event` WHERE `EventID`=$EventID";
    $statement = $dbh->query($sql);
    $dbh = null;
    return $statement;
}

//get trainer detail
function GetTrainer($EventID){
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Event` as E LEFT JOIN Booking as B ON E.BookingID = B.BookingID left join User as U on B.UserID=U.UserID WHERE `EventID`='$EventID'";
    $statement = $dbh->query($sql);
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Get booking Day
function Getbookingday(){
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Event` as E LEFT JOIN Booking as B ON E.BookingID = B.BookingID";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}
//Get booking Day By id
function GetbookingdaybyID($FacilityID){
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Event` as E LEFT JOIN Booking as B ON E.BookingID = B.BookingID WHERE B.FacilityID='$FacilityID'";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Get booking by facility ID
function GetbookingByFacilityID($FacilityID){
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM Booking WHERE FacilityID='$FacilityID'";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

//Get Booking by User id
function GetbookingByUserID($UserID){
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM Booking WHERE UserID='$UserID'";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}
?>
