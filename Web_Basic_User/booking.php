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

foreach ($result as $row){
    $data[]= array(
        'id'        => $row["BookingID"],
        'title'     => $row["Name"],
        'start'     => $row["Starttime"],
        'end'       => $row["Endtime"],

    );
}

echo json_encode($data);
