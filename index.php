<?php
	require_once("header.main.php");
	require_once("index.carousel.php");
	
	$productTypes = array("Popular","Sale","Suggestion");
	foreach ($productTypes as $type)
	{
		include("product.carousel.php");
	}
	
	require_once("footer.main.php");
?>