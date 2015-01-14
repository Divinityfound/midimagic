<?php
	class dbInsert extends dbWork
	{
		var $variables;
		var $values;
		
		function variables($data)
		{
			$this->variables = $data;
		}
		
		function values($data)
		{
			$this->values = $data;
		}
		
		function execute()
		{
			$this->sql = sprintf("INSERT INTO %s (%s) VALUES (%s);",$this->table,$this->variables,$this->values);
			if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
			{
				echo $this->sql."<br />";
			}
			mysql_query($this->sql);
		}
	}
?>