<?php
	if($_COOKIE["login"] != "") header('Location: index.php');
	if($_POST["login"] != ""){
		require "base.php";
		if(!user_exist($_POST["login"])){
			if(!user_exist($_POST["email"])){
				if($_POST["password"] == $_POST["confirm_password"]){
					append_user($_POST["login"], $_POST["email"], $_POST["password"], $_POST["communication"]);
					$user = check_user($_POST["login"], $_POST["password"]);
					setcookie("id_user", $user["id_user"]);
					setcookie("login", $user["login"]);
					setcookie("email", $user["email"]);
					setcookie("communication", $user["communication"]);
                    $id = $user["id_user"];
					$sql = "INSERT INTO information_users(id_user) VALUES ($id)";
					queryAll($sql, false);
					header('Location: index.php');
				}
				else echo "<script>alert('Пароли не совпадают')</script>";
			}
			else echo "<script>alert('Пользователь с такой почтой существует')</script>";
		}
		else echo "<script>alert('Пользователь с таким логином существует')</script>";
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body>
		<div style="margin-top: 100px">
			<form class="form" action="registration.php" method=POST>
				<input type="text" placeholder="login" name="login"/>
				<input type="email" placeholder="email" name="email"/>
				<input type="text" placeholder="communication: vk/what's app..." name="communication"/>
				<input type="password" placeholder="password" name="password"/>
				<input type="password" placeholder="confirm password" name="confirm_password"/>
				<button type="submit">Регистрация</button>
				<p class="message">Есть аккаунт?<a href="prof.php">Войти</a></p>
			</form>
		</div>
	</body>
	
</html>