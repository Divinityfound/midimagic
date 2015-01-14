<?php
	require_once("config.shortcut.php");
	if (isset($user))
	{
		$user->session->deleteMap();
	}
	header("Location: ".URL);
?>