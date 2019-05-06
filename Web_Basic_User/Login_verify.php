<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-03-11
 * Time: 14:55
 * Check the Login
 */
require_once '../DataBase/database.php';

if (!isset($_POST['userName'])) {
    die("User name not define.");
}

if (!isset($_POST['password'])) {
    die("Password not define.");
}

$username = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);



$salt = "shuaige";
$password = $password . $salt;
try {
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Users` WHERE userName='$username'";
    $statement = $dbh->query($sql);
    $User = $statement->fetch(PDO::FETCH_ASSOC);
    $hash = $User['password'];
    if (password_verify($password, $hash)) {
        header("refresh:0;url=index.php");
        session_start();
        $_SESSION['User'] = $User;
    } else {
        echo "<script>alert('Username or password invalid');location.href='LoginPage.php';</script>";
    }
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

?>
