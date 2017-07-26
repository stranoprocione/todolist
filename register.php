<?php
	session_start();
	require_once("dbconnect.php");
	$_SESSION["error_messages"] = '';
	$_SESSION["success_messages"] = '';
?>
<?php
	if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])){
		$captcha = trim($_POST["captcha"]);
		if(isset($_POST["captcha"]) && !empty($captcha)){
			if(($_SESSION["rand"] !=$captcha) && ($_SESSION["rand"] != "")){
				$error_message = "<p class='message_error'><strong>Ошибка!</strong>Вы ввели неправильный код</p>";
				$_SESSION["error_messages"] = $error_message;
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: ".$address_site."form_register.php");
				exit();
			}
			if(isset($_POST["login"])){
				$login = trim($_POST["login"]);
				if(!empty($login)){
					$login = htmlspecialchars($login, ENT_QUOTES);
				}else{
					$_SSESION["error_messages"].="<p class='message_error'>Укажите ваш логин</p>";
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: ".$address_site."form_register.php");
					exit();
				}
			}else{
				$_SESSION["error_message"].="<p class='message_error'>Отсутствует поле с именем</p>";
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: ".$address_site."form_register.php");
				exit();
			}
			if(isset($_POST["email"])){
				$email = htmlspecialchars(trim($_POST["email"]), ENT_QUOTES);
				$reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+$/i";
				if(!preg_match($reg_email, $email)){
					$_SESSION["error_messages"] .="<p class='message_error'>Вы ввели неправильный email (".$email.")</p>";
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: ".$address_site."form_register.php");
					exit();
				}
				$result_query = $mysqli->query("SELECT email FROM users WHERE email='".$email."'");
				if($result_query->num_rows == 1){
					if(($row = $result_query->fetch_assoc()) != false){
						$_SESSION["error_messages"] .="<p class='message_error'>Пользователь с таким адресом уже зарегистрирован</p>";
						header("HTTP/1.1 301 Moved Permanently");
						header("Location: ".$address_site."form_register.php");
						exit();
					}else{
						$_SESSION["error_messages"] .="<p class='message_error'>Ошибка в запросе к БД</p>";
						header("HTTP/1.1 301 Moved Permanently");
						header("Location: ".$address_site."form_register.php");
						exit();
					}
				}
			}
			if(isset($_POST["password"])){
				if(!empty($password)){
					$password = htmlspecialchars($password, ENT_QUOTES);
					$password = md5($password."top_secret");
				}else{
					$_SESSION["error_message"] .="<p class='message_error'>Укажите ваш пароль</p>";
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: ".$address_site."form_auth.php");
					exit();
				}
			}else{
				$_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: ".$address_site."form_register.php");
				exit();
			}
			$result_query_insert = $mysqli->query("INSERT INTO `users` (login, email, password) VALUES ('".$login."', '".$email."', '".$password."')");
			if(!$result_query_insert){
				$_SESSION["error_messages"] .="<p class='message_error'>Ошибка запроса на добавление пользователя в БД</p>";
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: ".$address_site."form_register.php");
				exit();
			}else{
				$_SESSION["success_messages"] = "<p class='success_message'>Регистрация прошла успешно! <br />Теперь Вы можете авторизоваться, используя Ваш логин и пароль.</p>";
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: ".$address_site."index.php");
				echo $result_query_insert;
			}
			$result_query_insert->close();
			$mysqli->close();
		}else{
			exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
		}
	}
?>

