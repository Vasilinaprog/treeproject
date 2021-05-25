<!DOCTYPE html>
<html lang="en">
<?php require "base.php" ?>
<head>
    <meta charset="UTF-8"/>
    <title>Профиль</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
    <link href="css\base.css" rel="stylesheet"/>
    <link href="css\prof.css" rel="stylesheet"/>
</head>
<?php
if (!$_COOKIE["login"]) {
    header("Location: tree.php");
}
$user = getUser();
$user_info = getUserInfo();
?>


<body>
<?php require "parts/header.php" ?>
<div class="main">
    <div class="profile_card_board">
        <div class="profile_card_body">
            <div class="profile_col_block">
                <div class="container-for-profile">
                    <div class="profile_col_block">
                        <div class="profile_img">
                            <img src="img\profile_photo.png" title="на главную страницу" alt=""/>
                        </div>
                        <?php if ($user_info["name"]): ?>
                            <h1><?= $user_info["name"] ?></h1>
                        <?php else: ?>
                            <h1>Введите имя</h1>
                        <?php endif; ?>
                        <div style="display: flex">
                            <div>
                                <h5>Ваш id для приглашения: </h5>
                            </div>
                            <div>
                                <?php if ($user["id_user"]): ?>
                                    <h5><?= $user["id_user"] ?></h5>
                                <?php else: ?>
                                    <h5>id</h5>
                                <?php endif; ?>
                            </div>
                        </div>


                    </div>

                    <div>
                        <!--                        блок с различными доп параметрами-->
                        <h2>Дополнительная информация</h2>
                        <div class="about-person">
                            <div>
                                <?php if ($user_info["height"]): ?>

                                    <input parameter="height" class="change-input" value="<?= $user_info["height"] ?>"
                                           type="number">
                                <?php else: ?>
                                    <input parameter="height" class="change-input" placeholder="Рост" type="number">

                                <?php endif; ?>


                            </div>
                            <div class="additional-inf">
                                <div class="select-text">
                                    Цвет волос:
                                </div>

                                <select parameter="hair_colour">
                                    <?php if ($user_info["hair_colour"] == "dark"): ?>
                                        <option selected="selected" value="dark">Темные</option>
                                    <?php else: ?>
                                        <option value="dark">Темные</option>
                                    <?php endif ?>

                                    <?php if ($user_info["hair_colour"] == "redheads"): ?>
                                        <option selected="selected" value="redheads">Рыжие</option>
                                    <?php else: ?>
                                        <option value="redheads">Рыжие</option>
                                    <?php endif; ?>
                                    <?php if ($user_info["hair_colour"] == "blond"): ?>
                                        <option selected="selected" value="blond">Блонд</option>
                                    <?php else: ?>
                                        <option value="blond">Блонд</option>

                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="additional-inf">
                                <div class="select-text">
                                    Профессия
                                </div>
                                <select parameter="profession">
                                    <?php if ($user_info["profession"] == "technical"): ?>
                                        <option selected="selected" value="technical">Техническая</option>
                                    <?php else: ?>
                                        <option value="technical">Техническая</option>
                                    <?php endif; ?>
                                    <?php if ($user_info["profession"] == "humanitarian"): ?>
                                        <option selected="selected" value="humanitarian">Гуманитарная</option>
                                    <?php else: ?>
                                        <option value="humanitarian">Гуманитарная</option>
                                    <?php endif; ?>
                                    <?php if ($user_info["profession"] == "other"): ?>
                                        <option selected="selected" value="other">Другое</option>
                                    <?php else: ?>
                                        <option value="other">Другое</option>
                                    <?php endif; ?>


                                </select>
                            </div>
                            <div>
                                <div class="additional-inf">
                                    <div class="select-text">
                                        Цвет глаз:
                                    </div>
                                    <select parameter="eye_colour">
                                        <?php if ($user_info["eye_colour"] == "blue"): ?>
                                            <option selected="selected" value="blue">Голубые</option>
                                        <?php else: ?>
                                            <option value="blue">Голубые</option>
                                        <?php endif; ?>
                                        <?php if ($user_info["eye_colour"] == "brown"): ?>
                                            <option selected="selected" value="brown">Карие</option>
                                        <?php else: ?>
                                            <option value="brown">Карие</option>
                                        <?php endif; ?>
                                        <?php if ($user_info["eye_colour"] == "green"): ?>
                                            <option selected="selected" value="green">Зеленые</option>
                                        <?php else: ?>
                                            <option value="green">Зеленые</option>

                                        <?php endif; ?>


                                    </select>
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
                                        <input type="text" value="<?= $user_info["name"] ?>" parameter="name"
                                               class="change-input" name="name"/>
                                    <?php else: ?>
                                        <input type="text" parameter="name" class="change-input" placeholder="Имя"
                                               name="name"/>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <?php if ($user_info["surname"]): ?>
                                        <input type="text" parameter="surname" class="change-input"
                                               value="<?= $user_info["surname"] ?>" name="surname"/>
                                    <?php else: ?>
                                        <input type="text" parameter="surname" class="change-input"
                                               placeholder="Фамилия" name="surname"/>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <?php if ($user_info["patronymic"]): ?>
                                        <input type="text" parameter="patronymic" class="change-input"
                                               value="<?= $user_info["patronymic"] ?>" name="second_name"/>
                                    <?php else: ?>
                                    <input type="text" parameter="patronymic" class="change-input"
                                           placeholder="Отчество" name="second_name"/>
                                    <div>
                                        <?php endif; ?>
                                    </div>
                                    <div>

                                        <div class="birthday">
                                            Дата рождения
                                        </div>
                                        <?php if ($user_info["birthday"]): ?>
                                            <input type="date" parameter="birthday" class="change-input"
                                                   value="<?= $user_info["birthday"] ?>" name="birthday"/>

                                        <?php else: ?>
                                            <input type="date" parameter="birthday" class="change-input"
                                                   name="birthday"/>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
                crossorigin="anonymous">
        </script>
</body>
<script src="js/changeUser.js"></script>
</html>