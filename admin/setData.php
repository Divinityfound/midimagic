<?php
	require_once("/../config.shortcut.php");
	require_once("setObject.php");
	
	if (METHOD == "POST")
	{
		foreach(array_keys($object->values) as $key)
		{
			if ($key != "id")
			{
				$object->values[$key] = $post[$key];
			}
		}
		if (isset($_GET["id"]) && $_GET["id"] != null)
		{
			$object->values["id"] = $_GET["id"];
			$object->updateMap();
		}
		else
		{
			$object->insertMap();
		}
		header("Location: viewData.php?view=".$_GET["view"]);
	}
?>