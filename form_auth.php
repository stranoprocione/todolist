<?php
	require_once("header.php");
?>
<div class="block_for_messages">
	<?php
		if (isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
			echo $_SESSION["error_messages"];
			unset ($_SESSION["error_messages"]);
		}
	?>
</div>
<?php 
	if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
?>

		<div id="form_auth">
			<h2>Форма авторизации</h2>
			<form action="auth.php" method="post" name="form_auth">
				<table>
					<tbody><tr>
						<td>Email: </td>
						<td>
							<input name="email" required="required" type="email"><br>
							<span id="valid_email_message" class="message_error"></span>
						</td>
					</tr>
					
					<tr>
						<td>Пароль:</td>
						<td>
							<input name="password" placeholder="минимум 6 символов" required="required" type="password"><br>
							<span id="valid_password_message" class="message_error"></span>
						</td>
					</tr>
					
					<tr>
						<td>Ввудите капчу: </td>
						<td>
							<p>
								<img src="captcha.php" alt="Изображение капчи" /> <br>
								<input name="captcha" placeholder="Проверочный код" type="text">
							</p>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input name="btn_submit_auth" value="Войти" type="submit">
						</td>
					</tr>
					</tbody>
				</table>
			</form>
		</div>
<?php
	} else {
?>
		<div id="aithorized">
			<h2>Вы уже авторизованы</h2>
		</div>
<?php
}

	require_once ("footer.php");
?>
	
	
