<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-06
 * Time: 15:32
 */
require_once '../DataBase/database.php';
$id = $_GET['FacilityID'];
if (!empty($id)) {
    $statement=DeleteGame($id);
    if($statement){
        header("Location:FacilityManagement.php");
    }

} else {
    die("Facility id not define");
}
?>