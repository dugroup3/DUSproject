<?php
require_once '../DataBase/database.php';

header("content-type:application/json;charset=utf-8");
$type = addslashes(htmlspecialchars(@$_POST['type']));
if ($type === 'get') {
    get();
}else if($type == 'detail'){
    detail();
}else{
    booking();
}

function get()
{
    $name = @$_POST['name'];
    $dbms = 'mysql';
    $dbName = 'dbtest';
    $host = 'dbtest.ce12oaotat2e.eu-west-2.rds.amazonaws.com';
    $user = 'root';
    $pass = '12341234';
    $dsn = "$dbms:host=$host;dbname=$dbName";
    $pdo = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    if ($name) {
        $statement = $pdo->query(
            "SELECT FacilityID, Name,Picture,Opentime,Closetime,Prices,Description FROM Facility WHERE Name like '%$name%';");
    } else {
        $statement = $pdo->query(
            "SELECT FacilityID,Name,Picture,Opentime,Closetime,Prices,Description From Facility;");
    }

    $senddata = array();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($senddata, array(
            'FacilityID' =>$row['FacilityID'],
            'Name' => $row['Name'],
            'Picture'=>"../public/img/" . $row['Picture'],
            'Opentime' => $row['Opentime'],
            'Closetime' => $row['Closetime'],
            'Prices' => $row['Prices'],
            'Description' =>$row['Description'],
        ));
    }
    echo json_encode($senddata);
    $conn = null;
}

function detail(){
    $dbms = 'mysql';
    $dbName = 'dbtest';
    $host = 'dbtest.ce12oaotat2e.eu-west-2.rds.amazonaws.com';
    $user = 'root';
    $pass = '12341234';
    $dsn = "$dbms:host=$host;dbname=$dbName";
    $pdo = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));

    $FacilityID    = addslashes(htmlspecialchars(@$_POST['FacilityID']));

    $statement = $pdo->query(
        "SELECT Name,Picture,Prices,Description FROM Facility  WHERE FacilityID = '$FacilityID';");

    $senddata = array();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($senddata, array(
            'Name' => $row['Name'],
            'Picture'=>"../public/img/" . $row['Picture'],
            'Prices' => $row['Prices'],
            'Description' =>$row['Description'],
            'FacilityID' => $FacilityID,
        ));
    }
    echo json_encode($senddata);
    $conn = null;
}
