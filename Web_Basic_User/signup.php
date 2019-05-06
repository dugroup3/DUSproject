<?php
/**
 * Created by PhpStorm.
 * User: jiangchiying
 * Date: 2019-03-06
 * Time: 12:33
 */
$username = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
if (empty($username)) {
    die("User name not define.");
}

if (empty($password)) {
    die("Password not define.");
}
if (empty($firstName)) {
    die("First name not define.");
}

if (empty($lastName)) {
    die("Last name not define.");
}

$salt = "shuaige";
$password_hash = $password . $salt;
$password_hash = password_hash($password_hash, PASSWORD_DEFAULT);


require_once '../DataBase/database.php';

try {
    $dbh = connectDBPDO();
    $sql = "SELECT * FROM `Users` WHERE userName='$username'";
    $statement = $dbh->query($sql);
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    $row = count($row);

    if ($row == 0) {
        $sql2 = "INSERT INTO `Users`(userName,password,firstName,lastName,role) VALUES ('$username','$password_hash','$firstName','$lastName',0)";
        $statement2 = $dbh->query($sql2);
        if ($statement2) {
            echo "<script>alert('Register success!');location.href='LoginPage.php';</script>";
        } else {
            echo "Register fail";
        }
    } else {
        echo "Sign Up fail. This Username have been use";
    }

} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
?>