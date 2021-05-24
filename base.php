<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db_name = 'treeproject';
$pdo = new PDO("mysql:host=localhost;dbname=$db_name", $user, $password);

function getConnect()
{
    global $pdo;
    return $pdo;
}

require "query.php" ;


function append_user($login, $email, $password, $communication)
{
    $sql = "INSERT INTO users (login, email, communication, password) VALUES ('$login', '$email', '$communication', '$password')";
    queryAll($sql, false);
}

function check_user($login, $password)
{
    $sql = "SELECT * FROM users WHERE email = $login AND password = $password";
    $result = queryAll($sql, false);
    if (!empty($result)) return $result;
    else {
        $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $result = queryAll($sql, false);
        if (!empty($result)) return $result;
    }
    return false;
}

function user_exist($login)
{
    $sql = "SELECT * FROM users WHERE login='$login' OR email='$login'";
    $result = queryAll($sql, false);
    if (!empty($result)) return true;
    return false;
}


function getUser(){
    $login = $_COOKIE["login"];
    $sql = "SELECT * FROM users WHERE  login ='$login'";
    return queryAll($sql, false);
}
