<!DOCTYPE html>
<html lang="en">
<?php require "base.php" ?>
<head>
    <meta charset="UTF-8" />
    <title>Профиль</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="css\base.css" rel="stylesheet" />
    <link href="css\prof.css" rel="stylesheet" />
</head>
<?php
$user = getUser();

?>


<body>
    <?php require "parts/header.php"?>
    <div class="main">
        <div class="profile_card_board">
            <div class="profile_card_body">
                <div class="profile_col_block">
                    <div class="profile_row_block">
                        <div class="profile_col_block">
                            <div class="profile_img">
                                <img src="img\profile_photo.png" title="на главную страницу" alt="" />
                            </div>
                            <?php if($user["name"]):?>
                            <h1><?= $user["name"]?></h1>
                            <?php else: ?>
                                <h1>Введите имя</h1>
                            <?php endif; ?>
                            <h5>Ваш id для приглашения в деревья</h5>
                            <h5>id</h5>
                        </div>
                        <div class="profile_col_block">
                        <h2>Личная информация</h2>
                           <div style="margin-top: 150px">
			<form class="form" action="prof.php" method=POST>
				<input type="text" class="edit-name-input" placeholder="Имя" name="name"/>
				<input type="text" class="edit-surname-input" placeholder="Фамилия" name="surname"/>
                <input type="text" class="edit-patronymic-input" placeholder="Отчество" name="second_name"/>
                <input type="date" class="birthday-input" placeholder="День рождения" name="birthday"/>
				<button type="submit">Редактировать</button>
			</form>
		</div>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>
<script src="js/changeUser.js"></script>
</html>