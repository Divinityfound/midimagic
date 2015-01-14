<?php
	require_once("../config.shortcut.php");
	if (METHOD == "POST")
	{
		$class = $post["class"];
		$object = new $class();
		$object->selectPersonalVariables("id",$post["id"]);
		$key = $post["key"];
		$object->values[$key] = $post["val"];
		
		$object->updateMap();
		echo "Successfully Updated!";
	}
?>