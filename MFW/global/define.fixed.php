<?php
	//NO NEED TO EDIT
	
	$server = $_SERVER;
	$cookie = $_COOKIE;
	$user = false;
	
	define("METHOD", $server['REQUEST_METHOD']);
	define("USERIP",$server['REMOTE_ADDR']);
	define("DIREC", dirname(__FILE__)."/../");
	define("IMGDIR", DIREC."/../img/");
	define("STARTTIMER",microtime(true));
	
	if (METHOD == "POST")
	{
		$post = $_POST;
	}
?>