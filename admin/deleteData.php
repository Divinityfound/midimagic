<?php
	require_once("/../config.shortcut.php");
	require_once("setObject.php");
	
	$object->values["id"] = $_GET["id"];
	$object->deleteMap();
	header("Location: ".URL."admin/viewData.php?view=".$_GET["view"]);
?>