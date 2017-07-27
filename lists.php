<?php
    session_start();
    require_once ("dbconnect.php");
    $_SESSION["error_messages"] = '';
	$_SESSION["success_messages"] = '';


    if (!isset($_SESSION["user_id"])) {
        die(json_encode([ "status" => "error" ]));
    }
    if (isset($_POST["list_name"]) && !empty($_POST["list_name"])) {
        $list_name = trim($_POST["list_name"]);
        if(isset($_POST["content"]) && !empty($_POST["content"])) {
            $content = trim($_POST["content"]);
        }
        $sql = "INSERT INTO lists (user_id, list_name, content)
			VALUES ('{$_SESSION["user_id"]}', '{$list_name}', '{$content}')";

        if ($mysqli->query($sql) === TRUE) {
            $_SESSION["success_messages"] .="<p class='message_success'>List saved</p>";
            $mysqli->close ();
            echo json_encode([ "status" => "success" ]);
        } else {
            die(json_encode([ "status" => "error" ]));
        }
    }
?>
