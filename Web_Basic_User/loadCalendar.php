<?php
/*/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-10
 * Time: 22:38
 */

require_once '../DataBase/database.php';

session_start();
if($_SESSION['User']==null) {
    $dbh = connectDBPDO();
//Get the booking from database
    $data = array();
//$query = "SELECT * FROM `Booking` as B LEFT JOIN Facility as F ON B.FacilityID = F.FacilityID WHERE B.Totalcost!=0";
    $query = "SELECT * FROM `Booking` as B LEFT JOIN Facility as F ON B.FacilityID = F.FacilityID WHERE B.Totalcost!=0";
    $statement = $dbh->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

//Get the event from database
//$data2 = array();
    $query2 = "SELECT * FROM `Event` as E LEFT JOIN Booking as B ON E.BookingID = B.BookingID left join User as U on B.UserID=U.UserID";
    $statement2 = $dbh->prepare($query2);
    $statement2->execute();
    $result2 = $statement2->fetchAll();

    foreach ($result as $row) {
        if ($row["FacilityID"] == 14) {
            $row['Color'] = "yellow";
        }
        if ($row["FacilityID"] == 15) {
            $row['Color'] = "Green";
        }
        if ($row["FacilityID"] == 16) {
            $row['Color'] = "#e6e6fa";
        }
        if ($row["FacilityID"] == 17) {
            $row['Color'] = "#fff0f5";
        }

        $data[] = array(
            'id' => $row["BookingID"],
            'title' => $row["Name"],
            'start' => $row["Starttime"],
            'end' => $row["Endtime"],
            'color' => $row['Color'],

        );
    }

    foreach ($result2 as $row) {
        $dayofweek = $row['DaysOfWeek'];
        explode(',', $dayofweek, 0);
        $data[] = array(
            'id' => $row['EventID'],
            'title' => $row['Eventname'],
            'daysOfWeek' => $dayofweek,
            'startTime' => $row['EventStartTime'],
            'endTime' => $row['EventEndTime'],
            'startRecur' => $row['Starttime'],
            'endRecur' => $row['Endtime'],
            'color' => 'red',

        );
    }


    echo json_encode($data);
}else{
    $dbh = connectDBPDO();
//Get the booking from database
    $data = array();
    $UserID=$_SESSION['User']['UserID'];
//$query = "SELECT * FROM `Booking` as B LEFT JOIN Facility as F ON B.FacilityID = F.FacilityID WHERE B.Totalcost!=0";
    $query = "SELECT * FROM `Booking` as B LEFT JOIN Facility as F ON B.FacilityID = F.FacilityID WHERE B.Totalcost!=0 and B.UserID='$UserID'";
    $statement = $dbh->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

//Get the event from database
//$data2 = array();
    $query2 = "SELECT * FROM `Event` as E LEFT JOIN Booking as B ON E.BookingID = B.BookingID left join User as U on B.UserID=U.UserID";
    $statement2 = $dbh->prepare($query2);
    $statement2->execute();
    $result2 = $statement2->fetchAll();

    foreach ($result as $row) {


        $data[] = array(
            'id' => $row["BookingID"],
            'title' => $row["Name"],
            'start' => $row["Starttime"],
            'end' => $row["Endtime"],
            'color' => 'grey',

        );
    }

    foreach ($result2 as $row) {
        $dayofweek = $row['DaysOfWeek'];
        explode(',', $dayofweek, 0);
        $data[] = array(
            'id' => $row['EventID'],
            'title' => $row['Eventname'],
            'daysOfWeek' => $dayofweek,
            'startTime' => $row['EventStartTime'],
            'endTime' => $row['EventEndTime'],
            'startRecur' => $row['Starttime'],
            'endRecur' => $row['Endtime'],
            'color' => 'red',

        );
    }


    echo json_encode($data);
}
?>