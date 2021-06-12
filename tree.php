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
function opposite($data)
{
    //функция меняет по словарю
    $changes = ["Дедушка/бабушка" => "Внук", "Родитель" => "Ребенок", "Ребенок" => "Родитель", "Внук" => "Дедушка/бабушка"];
    $data2 = [];
    $i = 0;
    foreach ($data as $elem) {
        $elem["type"] = $changes[$elem["type"]];
        $data2[$i] = $elem;
        $i++;
    }
    return $data2;
}

function getByType($data1, $data2, $type)
{
    //находит среди двух массивов словарей нужные по типу
    $changes = ["Дедушки и бабушки" => "Дедушка/бабушка", "Родители" => "Родитель", "Дети" => "Ребенок", "Внуки" => "Внук"];
    $all = [];
    $i = 0;
    $type = $changes[$type];
    foreach ($data1 as $elem) {
        if ($elem["type"] == $type) {
            $all[$i] = $elem;
            $i++;
        }
    }
    foreach ($data2 as $elem) {
        if ($elem["type"] == $type) {
            $all[$i] = $elem;
            $i++;
        }
    }
    return $all;
}

$all_headers = ["Дедушки и бабушки", "Родители", "Дети", "Внуки"];

$id = $_COOKIE["id_user"];
$relationships = queryAll("SELECT * FROM relationship WHERE id_user = $id", true);

$relationshipsToMe = queryAll("SELECT * FROM relationship WHERE id_subscribe = $id AND id_user NOT IN (SELECT id_subscribe FROM relationship WHERE id_user = $id)", true);
$relationshipsToMe = opposite($relationshipsToMe);
?>
<div class="main">
    <h2>Ваши родственники:</h2>
    <div class="relatives">

        <?php foreach ($all_headers as $header): ?>
            <!--        TODO надо сделать дизайн того, как это будет отображаться + возможность перейти по этому профилю-->
            <p><?= $header ?></p>
            <?php $elems = getByType($relationships, $relationshipsToMe, $header); ?>
            <?php if (!empty($elems)): ?>
                <?php print_r($elems) ?>
            <?php else: ?>
                <p>Тут пока пусто</p>
            <?php endif ?>
        <?php endforeach; ?>
    </div>
</body>


<script src="js/changeUser.js"></script>
</html>
