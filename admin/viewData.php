<?php
	require_once("header.admin.php");
	if (isset($_GET["orderBy"]))
	{
		$object->orderBy = $_GET["orderBy"];
	}
	echo "<a href='#' class='newModal'>+ Add ".preg_replace('/([A-Z])/', ' $1', ucfirst($_GET["view"]))."</a><br /><br />";
?>
<center>
<?php
	echo "<table class='table table-hover table-condensed'><thead><tr>";
	foreach(array_keys($object->values) as $key)
	{
		if ($key == "id")
		{
			echo "<th style='width:66px;text-align: center;'>EDIT</th><th style='width:66px;text-align: center;'>COPY</th><th style='width:66px;text-align: center;'>DELETE</th>";
			echo "<th><a href='viewData.php?view=".$classname."&orderBy=".$key."'>".preg_replace('/([A-Z])/', ' $1', ucfirst($key))."</a></th>";
		}
		else
		{
			echo "<th><a href='viewData.php?view=".$classname."&orderBy=".$key."'>".preg_replace('/([A-Z])/', ' $1', ucfirst($key))."</a></th>";
		}
	}
	echo "</tr></thead>";
	
	$results = $object->pullAllResults();
	
	while($row = mysql_fetch_array($results))
	{
		echo "<tr>";
		foreach(array_keys($object->values) as $key)
		{
			if ($key == "id")
			{
				$id = $row[$key];
				echo "<td style='text-align: center'><a href='#' class='modalEdit $id' style='text-align: center'><i class='glyphicon glyphicon-edit'></i></a></td>";
				//echo "<td><a href='setData.php?view=".$_GET["view"]."&id=$id'><i class='glyphicon glyphicon-edit'></i></a></td>";
				echo "<td style='text-align: center'><a href='copyData.admin.php?view=".$_GET["view"]."&id=$id'><i class='glyphicon glyphicon-repeat'></i></a></td>";
				echo "<td style='text-align: center'><a href='deleteData.php?view=".$_GET["view"]."&id=$id'><i class='glyphicon glyphicon-remove'></i></a></td>";
				echo "<td>$id</td>";
			}
			else
			{
				echo "<td class='quickEdit $id' value='$key'>".$row[$key]."</td>";
			}
		}
		echo "</tr>";
	}
	
	echo "</table>";
?>
</center>
<div id="modalLocation"></div>
<?php

	//require_once("setData.modal.php");
	
	require_once("footer.admin.php");
?>