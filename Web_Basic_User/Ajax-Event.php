<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-14
 * Time: 11:16
 */

require_once '../DataBase/database.php';
$rows = Getbookingday();
echo json_encode($rows);
?>