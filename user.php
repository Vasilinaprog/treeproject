<?php
require "base.php"

//TODO надо сделать кнопку, по которой можно будет сделать его родственником (указать, кто он тебе)
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
    <link href="css\prof.css" rel="stylesheet"/>
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
    <div class="profile_card_board">
        <div class="profile_col_block">
            <div class="container-for-profile">
                <div class="profile_col_block">
                    <div class="profile_img">
                        <img src="img\profile_photo.png" title="на главную страницу" alt=""/>
                    </div>
                    <?php if ($user_info["name"]): ?>
                        <h1 id="name"><?= $user_info["name"] ?></h1>
                    <?php else: ?>
                        <h1 id="name"> Введите имя</h1>
                    <?php endif; ?>
                </div>

                <div class="user-information">
                    <!--                        блок с различными доп параметрами-->
                    <h2>Дополнительная информация</h2>
                    <div class="about-person">
                        <div>
                            <?php if ($user_info["height"]): ?>

                                <input disabled="disabled" parameter="height" class="change-input"
                                       value="<?= $user_info["height"] ?>"
                                       type="number">
                            <?php else: ?>
                                <input disabled="disabled" parameter="height" class="change-input" placeholder="Рост"
                                       type="number">

                            <?php endif; ?>


                        </div>
                        <div class="additional-inf">
                            <div class="select-text">
                                Цвет волос:
                            </div>
                            <div style="color: rebeccapurple">
                                <?php if ($user_info["hair_colour"] == "-"): ?>
                                    Не указан
                                <?php else: ?>
                                    <?= $user_info["hair_colour"] ?>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="additional-inf">
                            <div class="select-text">
                                Профессия
                            </div>
                            <div style="color: rebeccapurple">
                                <?php if ($user_info["profession"] == "-"): ?>
                                    Не указан
                                <?php else: ?>
                                    <?= $user_info["profession"] ?>
                                <?php endif ?>
                            </div>

                        </div>

                        <div>
                            <div class="additional-inf">
                                <div class="select-text">
                                    Цвет глаз:
                                </div>
                                <div style="color: rebeccapurple">

                                    <?php if ($user_info["eye_colour"] == "-"): ?>
                                        Не указан
                                    <?php else: ?>
                                        <?= $user_info["eye_colour"] ?>
                                    <?php endif ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h2>Личная информация</h2>
                    <div class="about-person">
                        <div>
                            <div>
                                <?php if ($user_info["name"]): ?>
                                    <input disabled="disabled" type="text" value="<?= $user_info["name"] ?>"
                                           parameter="name"
                                           class="change-input" name="name"/>
                                <?php else: ?>
                                    <input disabled="disabled" type="text" parameter="name" class="change-input"
                                           placeholder="Имя"
                                           name="name"/>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if ($user_info["surname"]): ?>
                                    <input disabled="disabled" type="text" parameter="surname" class="change-input"
                                           value="<?= $user_info["surname"] ?>" name="surname"/>
                                <?php else: ?>
                                    <input disabled="disabled" type="text" parameter="surname" class="change-input"
                                           placeholder="Фамилия" name="surname"/>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if ($user_info["patronymic"]): ?>
                                    <input disabled="disabled" type="text" parameter="patronymic" class="change-input"
                                           value="<?= $user_info["patronymic"] ?>" name="second_name"/>
                                <?php else: ?>
                                <input disabled="disabled" type="text" parameter="patronymic" class="change-input"
                                       placeholder="Отчество" name="second_name"/>
                                <div>
                                    <?php endif; ?>
                                </div>
                                <div>

                                    <div class="birthday">
                                        Дата рождения
                                    </div>
                                    <?php if ($user_info["birthday"]): ?>
                                        <input disabled="disabled" type="date" parameter="birthday" class="change-input"
                                               value="<?= $user_info["birthday"] ?>" name="birthday"/>

                                    <?php else: ?>
                                        <p style="color: rebeccapurple">Не указан</p>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


</body>
</html>
