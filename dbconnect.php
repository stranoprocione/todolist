<?php
	header('Content-Type: text/html; charset=utf-8');
	$server = "127.0.0.1";
	$username = "mapache_todo";
	$password = "E5ctcxL4";
	$database = "mapache_todo";
	
	$mysqli = new mysqli($server, $username, $password, $database);
	
	if (mysqli_connect_errno()) {
		echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки:".mysqli_connect_error()."</p>";
	}
	$mysqli->set_charset('utf8');
	$address_site = "https://mapache.ru/todo/";
?>
