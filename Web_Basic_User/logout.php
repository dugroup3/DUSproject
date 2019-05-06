<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-03-11
 * Time: 23:38
 */

session_start();
session_destroy();
echo "<script>alert('Log out success!');location.href='index.php';</script>";
?>