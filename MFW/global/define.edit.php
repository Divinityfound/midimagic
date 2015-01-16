<?php
	$server = $_SERVER;
	// DEV or PROD (case sensitive)
	define("ENVIRONMENT","PROD");
	if (ENVIRONMENT == "DEV")
	{
		define("EXTENSION", "midimagic/");
	}
	else if (ENVIRONMENT == "PROD")
	{
		define("EXTENSION", "midimagic/");
	}
	define("URL","http://$server[HTTP_HOST]"."/".EXTENSION);
	define("FULLURL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
	define("IMAGEURL",URL."img/");
	define("DB","midimagicapp");
?>