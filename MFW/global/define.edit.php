<?php
	$server = $_SERVER;
	// DEV or PROD (case sensitive)
	define("ENVIRONMENT","DEV");
	if (ENVIRONMENT == "DEV")
	{
		define("EXTENSION", "bootstrap/");
	}
	else if (ENVIRONMENT == "PROD")
	{
		define("EXTENSION", "");
	}
	define("URL","http://$server[HTTP_HOST]"."/".EXTENSION);
	define("FULLURL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
	define("IMAGEURL",URL."img/");
	define("DB","mathisonframework");
?>