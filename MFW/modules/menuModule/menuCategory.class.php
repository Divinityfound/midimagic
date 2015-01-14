<?php
	class menuCategory extends moduleMenus
	{
		var $tableName = "menucategory";
		
		function constructMenu()
		{
			$display = "";
			$this->orderBy = "itemOrder";
			$results = $this->pullAllResults($where="mcid=0");
			
			echo '<ul class="nav nav-pills input-group-addon">';
			echo '<li><a href="index.php">Home</a></li>';
			
			while ($row = mysql_fetch_array($results))
			{
				echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">';
				echo $row["categoryText"];
				echo '<b class="caret"></b></a><ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
				
				$subCatResults = $this->pullAllResults($where="mcid=".$row["id"]);
				
				while ($row2 = mysql_fetch_array($subCatResults))
				{
					echo "<li><a class='menuModal ".$row2["id"]."' tabindex='-1' href='#'>".$row2["categoryText"]."</a></li>";
				}
				
				echo '</ul></li>';
			}
			echo '</ul>';
		}
	}
?>