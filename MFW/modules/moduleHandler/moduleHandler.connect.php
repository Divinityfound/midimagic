<?php
	define("DIRMOD", DIREC."modules/");
	
	require_once(DIRMOD."aggregateFiles.module.class.php");
	require_once(DIRMOD."aggregateFilesModule/aggregateFiles.class.php");
	$filesRequired = new aggregateFiles();
?>