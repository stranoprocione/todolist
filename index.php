<?php
	require_once("header.php");
?>

<!DOCTYPE html>
<html>
    <head>
    	<title>To Do List</title>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,600italic,700italic,800italic,400,300,600,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="todo.css"/>
        <script type='text/javascript' src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
        <script type="text/javascript" src="todo.js"></script>
    </head>
    <body>
	<h2>To Do List</h2>
	<form name="checkListForm" onsubmit="return false">
		<input type="text" name="checkListItem" id="input"/>
		<input type="button" name="add" value="Add!" id="button"/>
	</form>
	</body>
	</html>
	
<?php
	require_once("footer.php");
?>
	
