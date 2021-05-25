<?php
setcookie("id_user", "", time() - 3600);
setcookie("login","", time() - 3600);
setcookie("email", "", time() - 3600);
setcookie("communication", "", time() - 3600);
header('Location: index.php');
?>