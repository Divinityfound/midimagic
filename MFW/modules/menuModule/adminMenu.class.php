<?php
	class adminMenu extends moduleMenus
	{
		var $tableName = "adminmenu";
		
		function displayMenu()
		{
			$display = "";
			$this->orderBy = "subMenu,displayText";
			$results = $this->pullAllResults();
			$currentSubMenu = "";
			echo '<ul class="nav nav-pills">';
			echo '<li><a href="#"><abbr title="MFW1.1 was developed using HTML5, CSS3, PHP5.2, Javascript, jQuery 2.1.1, and Bootstrap 3.3.1. The objective of MFW1.1 is the simplification of mapping the Business Layer and Data Layer. All objects are modular and can exist independently and can be easily un/loaded as needed. All objects are easily accessible and share a handful of DB functions, eliminating the need to write lengthy spaghetti code. Lastly, a backend DBA system exists to make it easier to track the changes and just as easily update the information. ">Mathison FrameWork 1.1</abbr></a></li>';
			while ($row = mysql_fetch_array($results))
			{
				if ($row["active"] = "true")
				{
					if ($row["URL"] != "")
					{
						if ($currentSubMenu != $row["subMenu"])
						{
							if ($currentSubMenu != "")
							{
								echo '</ul></li>';
							}
							echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">';
							echo $row["subMenu"];
							echo '<b class="caret"></b></a><ul class="dropdown-menu">';
						}
						echo "<li><a href='".$row["URL"]."'>".$row["displayText"]."</a></li>";
						$currentSubMenu = $row["subMenu"];
					}
				}
			}
			echo '</ul></li></ul><br />';
		}
	}
?>