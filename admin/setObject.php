<?php
	require_once(dirname(__FILE__)."/../config.shortcut.php");
	if (isset($_GET["view"]))
	{
		$classname = $_GET["view"];
		$object = new $classname();
	}
?>