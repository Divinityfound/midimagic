<?php
	class dbCount extends dbWork
	{
		var $total;
		function execute()
		{
			$this->sql = sprintf("SELECT count(*) as total from %s %s",$this->table,$this->where);
			if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
			{
				echo $this->sql."<br />";
			}
			$result = mysql_query($this->sql);
			$totalResult = mysql_fetch_assoc($result);
			$this->total = $totalResult["total"];
			
			if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
			{
				echo $this->total."<br />";
			}
		}
	}
?>