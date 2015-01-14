<?php
	class userMenu extends moduleMenus
	{
		var $tableName = "usermenu";
		
		function displayMenu()
		{
			$display = "";
			$this->orderBy = "itemOrder";
			$results = $this->pullAllResults($where = "mcid=".$_GET["id"]);
			echo '<ul class="nav">';
			
			while ($row = mysql_fetch_array($results))
			{
				if ($row["active"] == "true" && $row["URL"] != "")
				{
					echo "<li><a href='".$row["URL"]."'>".$row["displayText"]."</a></li>";
				}
			}
			echo '</ul>';
		}
	}
?>