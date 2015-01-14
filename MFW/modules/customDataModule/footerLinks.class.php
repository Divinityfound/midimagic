<?php
	class footerLinks extends customData
	{
		var $tableName = "footerlinks";
		
		function getFooterLinks()
		{
			$this->orderBy = "header,linkOrder";
			$results = $this->pullAllResults();
			$currentHeader = "";
			echo '<div class="row-fluid">';
			while ($row = mysql_fetch_array($results))
			{
				if ($currentHeader != $row["header"])
				{
					if ($currentHeader != "")
					{
						echo "</div>";
					}
					$currentHeader = $row["header"];
					echo '<div class="span2">';
					echo '<h4>'.$row["header"].'</h4>';
				}
				echo '<h6><a href="'.$row["URL"].'">'.$row["textData"].'</a></h6>';
			}
			echo '</div>';
		}
	}
?>