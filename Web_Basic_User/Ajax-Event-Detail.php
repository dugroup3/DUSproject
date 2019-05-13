<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-05-13
 * Time: 22:35
 */

require_once '../DataBase/database.php';

$id = $_GET['id'];


$rows=GetTrainer($id);
echo json_encode($rows);
?>