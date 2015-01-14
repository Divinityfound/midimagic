<?php
	require_once(DIREC."bl/functions.php");
	
	$requiredFiles = array(
		DIREC."global/define.edit.php",
		DIREC."db/dbconnect.php",
		DIREC."bl/email.php",
		DIREC."modules/moduleHandler.class.php",
		DIREC."modules/moduleHandler/moduleHandler.connect.php",
		DIREC."global/define.custom.php",
		DIREC."cm/allUserData.class.php",
	);
	
	$func = new functionality();
	$func->getRequiredFiles($requiredFiles);
?>