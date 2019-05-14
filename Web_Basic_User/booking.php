<?php
require_once '../DataBase/database.php';
$dbh=connectDBPDO();
//
$id=$_GET['id'];
$data = array();

$query = "SELECT * FROM `Booking` as B LEFT JOIN Facility as F ON B.FacilityID = F.FacilityID WHERE B.FacilityID='$id'";

$statement = $dbh->prepare($query);

$statement->execute();

$result = $statement->fetchAll();


//Load Evnet Detail.
$query2 = "SELECT * FROM `Event` as E LEFT JOIN Booking as B ON E.BookingID = B.BookingID WHERE B.FacilityID='$id' ";
$statement2 = $dbh->prepare($query2);
$statement2->execute();
$result2 = $statement2->fetchAll();

foreach ($result as $row){
    $data[]= array(
        'id'        => $row["BookingID"],
        'title'     => $row["Name"],
        'start'     => $row["Starttime"],
        'end'       => $row["Endtime"],

    );
}

foreach ($result2 as $row) {
    $dayofweek=$row['DaysOfWeek'];
    explode(',',$dayofweek,0);
    $data[] = array(
        'id' => $row['EventID'],
        'title' => $row['Eventname'],
        'daysOfWeek' => $dayofweek,
        'startTime' =>$row['EventStartTime'],
        'endTime'=>$row['EventEndTime'],
        'startRecur'=>$row['Starttime'],
        'endRecur'=>$row['Endtime'],
        'color'=>'red',

    );
}



echo json_encode($data);
