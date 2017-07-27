<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>To do list</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="todo.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="todo.js"></script>
	</head>
	<body>
		<div id="header">
			<h2>To do list</h2>
			<a href="index.php">Главная</a>
			<div id="auth_block">
				<?php
					if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
				?>
						<div id="link_register">
							<a href="form_register.php">Регистрация</a>
						</div>
						<div id="link_auth">
							<a href="form_auth.php">Авторизация</a>
						</div>
					<?php
					} else {
					?>
						<div id="link_logout">
							<a href="logout.php">Выход</a>
						</div>
					<?php
					}
					?>
					
				
			</div>
			<div class="clear"></div>
		</div>

	
