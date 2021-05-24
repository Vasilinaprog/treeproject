<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db_name = 'treeproject';
$pdo = new PDO("", $user, $password);

function getConnect(){

}

function append_user($login, $email, $password, $communication)
{
    global $link;
    $sql = "INSERT INTO users (login, email, communication, password) VALUES ('$login', '$email', '$communication', '$password')";
    $result = $link->query($sql);
}

function check_user($login, $password)
{
    global $link;
    $sql = "SELECT * FROM users WHERE email='$login' AND password='$password'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) while ($row = $result->fetch_assoc()) return array("id_user" => $row["id_user"], "login" => $row["login"], "email" => $row["email"]);
    else {
        $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) while ($row = $result->fetch_assoc()) return array("id_user" => $row["id_user"], "login" => $row["login"], "email" => $row["email"]);
    }
    return false;
}

function user_exist($login)
{
    global $link;
    $sql = "SELECT * FROM users WHERE login='$login' OR email='$login'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) return true;
    return false;
}

