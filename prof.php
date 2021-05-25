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
                        <?php if ($user["name"]): ?>
                            <h1><?= $user["name"] ?></h1>
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
                                <input parameter="height" class="change-input" placeholder="Рост" type="number">
                            </div>
                            <div  class="additional-inf">
                                <div class="select-text">
                                    Цвет волос:
                                </div>
                                <select>
<!--                                    TODO добавить поля в бд и добавить параметры в select -->
                                    <option value="dark">Темные</option>
                                    <option value="redheads">Рыжие</option>
                                    <option value="blond">Блонд</option>
                                    <option value="gray-haired">Седые</option>
                                    <option value="other">Другое</option>
                                </select>
                            </div>

                            <div  class="additional-inf">
                                <div class="select-text">
                                    Профессия
                                </div>
                                <select>
                                    <option value="technical">Техническая</option>
                                    <option value="humanitarian">Гуманитарная</option>
                                    <option value="other">Другое</option>
                                </select>
                            </div>
                            <div >
                                <div  class="additional-inf">
                                    <div class="select-text">
                                        Цвет глаз:
                                    </div>
                                    <select>
                                        <option value="blue">Голубые</option>
                                        <option value="brown">Карие</option>
                                        <option value="green">Зеленые</option>
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
                                    <?php if ($user["name"]): ?>
                                        <input type="text" value="<?= $user["name"] ?>" parameter="name"
                                               class="change-input" name="name"/>
                                    <?php else: ?>
                                        <input type="text" parameter="name" class="change-input" placeholder="Имя"
                                               name="name"/>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <?php if ($user["surname"]): ?>
                                        <input type="text" parameter="surname" class="change-input"
                                               value="<?= $user["surname"] ?>" name="surname"/>
                                    <?php else: ?>
                                        <input type="text" parameter="surname" class="change-input"
                                               placeholder="Фамилия" name="surname"/>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <?php if ($user["patronymic"]): ?>
                                        <input type="text" parameter="patronymic" class="change-input"
                                               value="<?= $user["patronymic"] ?>" name="second_name"/>
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
                                        <?php if ($user["birthday"]): ?>
                                            <input type="date" parameter="birthday" class="change-input"
                                                   value="<?= $user["birthday"] ?>" name="birthday"/>

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