<?php
	class customDefine extends customData
	{
		var $tableName = "customdefine";
		
		function getDefine()
		{
			$results = $this->pullAllResults();
			while ($row = mysql_fetch_array($results))
			{
				define($row["defineVar"],$row["defineData"]);
			}
		}
	}
?>