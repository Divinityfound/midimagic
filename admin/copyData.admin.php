<?php
	require_once("header.admin.php");
	if (isset($_GET["view"]) && isset($_GET["id"]))
	{
		$object->selectPersonalVariables("id",$_GET["id"]);
		$object->values["id"] = "";
		$object->insertMap();
	}
	header("Location: viewData.php?view=".$_GET["view"]);
?>