<?php
	class customPages extends customData
	{
		var $tableName = "custompages";
		
		function fillData()
		{
			if ($this->values["id"] == "")
			{
				$this->selectPersonalVariables("queryString",$_GET["v"]);
			}
		}
		
		function getHeader()
		{
			$this->fillData();
			echo "<h3>".$this->values["pageHeader"]."</h3>";
		}
		
		function getHTML()
		{
			$this->fillData();
			echo $this->values["pageHtml"]."<br /><br />";
		}
	}
?>