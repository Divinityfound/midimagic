<?php
	require_once("/../global/config.php");
	
	if (ENVIRONMENT == "DEV")
	{
		define("HOST","LOCALHOST");
		define("USER","root");
		define("PASS","asd34964");
	}
	else if (ENVIRONMENT == "PROD")
	{
		define("HOST","seaweed.arvixe.com");
		define("USER","skynet");
		define("PASS","asd34964");
	}
	
	$con = mysql_connect(HOST,USER,PASS);
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db(DB, $con);

	require("dbActions.php");
?>
