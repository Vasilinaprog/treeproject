<?php
	session_start();
	require "base.php";
	if($_COOKIE["login"] != "") header('Location: prof.php');
	if($_POST["login"] != ""){
		$user = check_user($_POST["login"], $_POST["password"]);
		if($user){
		    setcookie("id_user", $user["id_user"], time() + 3600);
		    setcookie("login", $user["login"], time() + 3600);
		    setcookie("email", $user["email"], time() + 3600);
		    setcookie("communication", $user["communication"], time() + 3600);

			header('Location: prof.php');
		}
		else echo "<script>alert('Неверный логин и/или пароль')</script>";
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body>
		<div style="margin-top: 150px">
			<form class="form" action="index.php" method=POST>
				<input type="text" placeholder="login/email" name="login"/>
				<input type="password" placeholder="password" name="password"/>
				<button type="submit">login</button>
				<p class="message">Нет аккаунта?<a href="registration.php">Зарегистрироваться</a></p>
			</form>
		</div>
	</body>
	
</html>