<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-03-11
 * Time: 17:31
 */

function connectDBPDO()
{
    $dbms = 'mysql';     //Data base type
    $dbName = 'Iccnn23_Project';
//    $host = 'mysql.dur.ac.uk';
//    $user = 'ccnn23';
//    $pass = 'r35udder';
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';

    $dsn = "$dbms:host=$host;dbname=$dbName";
    $dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    return $dbh;
}

//Check User Session
function checkLogin()
{
    if (empty($_SESSION['User'])) {
        die("Please Login");
    }
}

//Check Admin Session
function checkAdmin()
{
    if ($_SESSION['User']['role'] != 1) {
        die("You are not Admin. Entry forbidden！");
    }
}


//Get the Whole User List
function getUsersList()
{
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM Users";
    $statement = $dbh->query($sql);
    $rows = $statement->fetchALL(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}

?>
