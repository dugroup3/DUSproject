<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-06
 * Time: 15:32
 */
require_once '../DataBase/database.php';
$id = $_GET['FacilityID'];
$result = SelectFacility($id);
$imgname = $result['Picture'];
$imgname = "../public/img/".$imgname;
if (!empty($id)) {
    //Delete the Facility information from database.
    $statement=DeleteGame($id);
    //Delete the photo from local file.
    unlink($imgname);
    if($statement){
        header("Location:FacilityManagement.php");
    }

} else {
    die("Facility id not define");
}
?>