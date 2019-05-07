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

//Check User Session
function checkLogin()
{
    if (empty($_SESSION['User'])) {
        die("Please Login");
    }
}

//Check Admin Session
function checkAdmin()
{
    if ($_SESSION['User']['role'] != 1) {
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
function DeleteGame($FacilityID)
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
?>
