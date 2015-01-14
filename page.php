<?php
	require_once("header.main.php");
	
	$page = new customPages;
	$page->getHeader();
	$page->getHTML();
	
	require_once("footer.main.php");
?>