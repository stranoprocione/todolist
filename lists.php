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
            $content = $_POST["content"];
        }
        if (!is_array($content)) {
                die(json_encode(["status" => "error"]));
        }
        $status = "success";
        foreach ($content as $list_item) {
            if (!empty($list_item)) {
                $sql = "INSERT INTO lists (user_id, list_name, content)
                    VALUES ('{$_SESSION["user_id"]}', '{$list_name}', '{$list_item}')";

                if ($mysqli->query($sql) === FALSE) {
                    $status = "error";
                    break;
                }
            }
        }
        $mysqli->close();
        echo json_encode([ "status" => $status ]);
        exit();
    }
    die(json_encode(["status" => "xyi"]));
?>
