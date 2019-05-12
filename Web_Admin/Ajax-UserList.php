<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-12
 * Time: 21:25
 */
require_once '../DataBase/database.php';
$rows=getTrainerList();
echo json_encode($rows);

?>