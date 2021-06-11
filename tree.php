<?php
//TODO надо сделать дерево в виде списка, брать из бд уже типы, чтобы ничего лишнего не было, так проще

?>
<!DOCTYPE html>
<html lang="en">
<?php require "base.php" ?>
<head>
    <meta charset="UTF-8"/>
    <title>Родственники</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
    <link href="css\base.css" rel="stylesheet"/>
    <link href="css\tree.css" rel="stylesheet"/>
</head>
<?php
if (!$_COOKIE["login"]) {
    header("Location: index.php");
}

?>


<body>
<?php require "parts/header.php" ?>
<?php
$changes = ["Дедушка/бабушка" => "Внук", "Родитель" => "Ребенок", "Ребенок" => "Родитель", "Внук" => "Дедушка/бабушка"];
$id = $_COOKIE["id_user"];
//TODO надо переделать и удалить все это
//$all_headers = queryAll("SELECT DISTINCT type FROM relationship WHERE id_user = $id OR id_subscribe = $id", true);
//$relationships1 = queryAll("SELECT * FROM relationship WHERE id_user = $id", true);
//$id_of_subscribes_fetch = queryAll("SELECT id_subscribe FROM relationship WHERE id_user = $id", true);
//$id_of_subscribes = [];
//$i = 0;
//foreach ($id_of_subscribes_fetch as $id_user){
//    $id_of_subscribes[$i] = $id_user[0];
//    $i++;
//}
//$relationshipsAnother = queryAll("SELECT * FROM relationship WHERE id_subscribe = $id AND id_user NOT IN $id_of_subscribes", true)

?>
<div class="main">
    <h2>Ваши родственники:</h2>
    <div class="relatives">
<!--        TODO надо переделать это-->
    </div>
</body>


<script src="js/changeUser.js"></script>
</html>
