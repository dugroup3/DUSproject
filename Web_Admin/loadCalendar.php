<?php
/*/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-10
 * Time: 22:38
 */

require_once '../DataBase/database.php';

$dbh = connectDBPDO();
//Get the booking from database
$data = array();
//$query = "SELECT * FROM `Booking` as B LEFT JOIN Facility as F ON B.FacilityID = F.FacilityID WHERE B.Totalcost!=0";
//$query = "SELECT * FROM `Booking` as B LEFT JOIN Facility as F ON B.FacilityID = F.FacilityID";
$query = "SELECT * FROM `Booking` as B LEFT JOIN Facility as F ON B.FacilityID = F.FacilityID LEFT JOIN `User` as U ON B.UserID=U.UserID";
$statement = $dbh->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


foreach ($result as $row) {
    if($row["FacilityID"]==14){
        $row['Color']="yellow";
    }
    if($row["FacilityID"]==15){
        $row['Color']="Green";
    }
    if($row["FacilityID"]==16){
        $row['Color']="#e6e6fa";
    }
    if($row["FacilityID"]==17){
        $row['Color']="#fff0f5";
    }

    $data[] = array(
        'id' => $row['BookingID'],
        'FacilityID'=>$row['FacilityID'],
        'title' => $row["Name"],
        'start' => $row["Starttime"],
        'end' => $row["Endtime"],
        'color'=>$row['Color'],
        'Username'=>$row['Username'],
    );
}



echo json_encode($data);
?>