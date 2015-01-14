<?php
	class dbUpdate extends dbWork
	{
		var $set;
		
		function set($data)
		{
			$this->set = $data;
		}
		
		function execute()
		{
			$this->sql = sprintf("UPDATE %s SET %s %s;",$this->table,$this->set,$this->where);
			if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
			{
				echo $this->sql."<br />";
			}
			mysql_query($this->sql);
		}
	}
?>