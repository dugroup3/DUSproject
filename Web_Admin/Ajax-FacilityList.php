<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-16
 * Time: 16:14
 */
require_once '../DataBase/database.php';
$rows=getFacilityList();
echo json_encode($rows);

?>