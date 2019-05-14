<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-14
 * Time: 17:20
 */

require_once '../DataBase/database.php';

$FacilityID = $_GET['FacilityID'];
$rows = GetbookingdaybyID($FacilityID);
if($rows!=null){
    echo json_encode($rows);
}else{
    echo json_encode(array('noevent'=>'ok'));
}
//echo json_encode($rows);
?>