<?php
	class moduleMenus extends moduleHandler
	{
		var $tableArrays = array(
			"adminmenu" => array(
				"id" => "",
				"subMenu" => "",
				"displayText" => "",
				"URL" => "",
				"active" => ""),
			"usermenu" => array(
				"id" => "",
				"mcid" => "",
				"displayText" => "",
				"itemOrder" => "",
				"URL" => "",
				"active" => ""),
			"menucategory" => array(
				"id" => "",
				"mcid" => "",
				"categoryText" => "",
				"itemOrder" => "")
			);
		
		function displayMenu()
		{
			$display = "";
			$this->orderBy = "subMenu,displayText";
			$results = $this->pullAllResults();
			$currentSubMenu = "";
			while ($row = mysql_fetch_array($results))
			{
				if ($row["active"] == "true")
				{
					if ($row["URL"] != "")
					{
						if ($currentSubMenu != $row["subMenu"])
						{
							echo "<br /><span>".$row["subMenu"]."</span><br /><br />";
						}
						echo "<a href='".$row["URL"]."'>".$row["displayText"]."</a><br />";
						$currentSubMenu = $row["subMenu"];
					}
				}
			}
		}
	}
?>