<?php
	require_once("header.php");
?>


		<?php
			if (isset ($_SESSION["success_messages"]) && !empty ($_SESSION["success_messages"])){
				echo $_SESSION["success_messages"];
				unset ($_SESSION["success_messages"]);
			}
		?>
		
		<form name="checkListForm" onsubmit="return false">
			<input type="text" name="checkListItem" id="input"/>
			<input type="button" name="add" value="Add!" id="button"/>
		</form>
		
		<div class="list"></div>
		<div class="save"></div>
	
<?php
	require_once("footer.php");
?>
	
