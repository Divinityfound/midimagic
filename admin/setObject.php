<?php
	require_once("/../config.shortcut.php");
	if (isset($_GET["view"]))
	{
		$classname = $_GET["view"];
		$object = new $classname();
	}
?>