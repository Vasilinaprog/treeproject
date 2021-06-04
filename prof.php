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
    header("Location: index.php");
}
$user = getUser();
$user_info = getUserInfo();
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
                                <?php if ($user_info["hair_colour"] == "Темные"): ?>
                                    <option selected="selected" value="Темные">Темные</option>
                                <?php else: ?>
                                    <option value="Темные">Темные</option>
                                <?php endif ?>

                                <?php if ($user_info["hair_colour"] == "Рыжие"): ?>
                                    <option selected="selected" value="Рыжие">Рыжие</option>
                                <?php else: ?>
                                    <option value="Рыжие">Рыжие</option>
                                <?php endif; ?>
                                <?php if ($user_info["hair_colour"] == "Блонд"): ?>
                                    <option selected="selected" value="Блонд">Блонд</option>
                                <?php else: ?>
                                    <option value="Блонд">Блонд</option>

                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="additional-inf">
                            <div class="select-text">
                                Профессия
                            </div>
                            <select parameter="profession">
                                <?php if ($user_info["profession"] == "Техническая"): ?>
                                    <option selected="selected" value="Техническая">Техническая</option>
                                <?php else: ?>
                                    <option value="Техническая">Техническая</option>
                                <?php endif; ?>
                                <?php if ($user_info["profession"] == "Гуманитарная"): ?>
                                    <option selected="selected" value="Гуманитарная">Гуманитарная</option>
                                <?php else: ?>
                                    <option value="Гуманитарная">Гуманитарная</option>
                                <?php endif; ?>
                                <?php if ($user_info["profession"] == "Другое"): ?>
                                    <option selected="selected" value="Другое">Другое</option>
                                <?php else: ?>
                                    <option value="Другое">Другое</option>
                                <?php endif; ?>


                            </select>
                        </div>

                        <div>
                            <div class="additional-inf">
                                <div class="select-text">
                                    Цвет глаз:
                                </div>
                                <select parameter="eye_colour">
                                    <?php if ($user_info["eye_colour"] == "Голубые"): ?>
                                        <option selected="selected" value="Голубые">Голубые</option>
                                    <?php else: ?>
                                        <option value="Голубые">Голубые</option>
                                    <?php endif; ?>
                                    <?php if ($user_info["eye_colour"] == "Карие"): ?>
                                        <option selected="selected" value="Карие">Карие</option>
                                    <?php else: ?>
                                        <option value="Карие">Карие</option>
                                    <?php endif; ?>
                                    <?php if ($user_info["eye_colour"] == "Зеленые"): ?>
                                        <option selected="selected" value="Зеленые">Зеленые</option>
                                    <?php else: ?>
                                        <option value="Зеленые">Зеленые</option>

                                    <?php endif; ?>


                                </select>
                            </div>
                        </div>
                        <div id="file">
                            <input type="file" size="1" id="load-file-input">
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
                crossorigin="anonymous">
        </script>
</body>


<script src="js/changeUser.js"></script>
</html>