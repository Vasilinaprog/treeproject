<!DOCTYPE html>
<html lang="en">
<?php require "base.php" ?>

<head>
    <meta charset="UTF-8"/>
    <title>Профиль</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
    <link href="css\base.css" rel="stylesheet"/>
    <link href="css\find.css" rel="stylesheet"/>
    <link href="css\prof.css" rel="stylesheet"/>
</head>
<?php
if (!$_COOKIE["login"]) {
    header("Location: index.php");
}
?>


<body>
<?php require "parts/header.php" ?>

<div class="main">
    <div class="header-find" style="display: flex">

        <div class="additional-inf-find">
            <div class="select-text">
                Имя/фамилия/отчество:
            </div>
            <input type="text" placeholder="Введите имя">
        </div>
        <div class="additional-inf-find">
            <div class="select-text">
                Цвет волос:
            </div>
            <select name="color">
                <option value="Темные">Темные</option>
                <option value="Рыжие">Рыжие</option>
                <option value="Блонд">Блонд</option>
                <option value="Другое">Другое</option>
                <option selected="selected" value="">-</option>
            </select>
        </div>
        <div class="additional-inf-find">
            <div class="select-text">
                Профессия
            </div>
            <select name="profession">
                <option value="Техническая">Техническая</option>
                <option value="Гуманитарная">Гуманитарная</option>
                <option value="" selected="selected">-</option>
            </select>
        </div>
        <div class="additional-inf-find">
            <div class="select-text">
                Цвет&ensp;глаз:
            </div>
            <select name="color_eyes">
                <option value="Голубые">Голубые</option>
                <option value="Карие">Карие</option>
                <option value="Зеленые">Зеленые</option>
                <option selected="selected" value="">-</option>
            </select>
        </div>


    </div>

    <div class="answer">
        <table>

        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Цвет волос</th>
            <th>Профессия</th>
            <th>Цвет глаз</th>
            <th>Рост</th>
            <th>День рождения</th>
            <th>Контакты</th>
        </tr>
        </table>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous">
</script>

<script src="js/find.js"></script>
</body>
</html>