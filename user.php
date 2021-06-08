<?php
// TODO сделать тут то, как видит пользователь
// TODO другого пользователя, ве его данные заданные итд GET запросом передается id пользователя
require "base.php"

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
    <link href="css\base.css" rel="stylesheet"/>

    <title>Пользователь</title>
</head>

<?php

if (!$_COOKIE["login"]) {
    header("Location: index.php");
}
$user_info = getUserInfo($_GET["id"]);

?>
<body>
<?php require "parts/header.php" ?>
<div class="main">
    <?php
    print_r($user_info)
    ?>
</div>



</body>
</html>
