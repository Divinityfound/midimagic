<?php
	$permissionRequired = false;
	$permittedAdmin = array(
		"86.43.120.69",
		"67.3.174.169",
		"::1");
	if (in_array(USERIP, $permittedAdmin) || $permissionRequired == false)
	{
		$menu = new adminMenu;
		$menu->displayMenu();
	}
	else
	{
		header("Location: ".URL);
	}
?>