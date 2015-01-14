<?php
	class dbDelete extends dbWork
	{
		function execute()
		{
			$this->sql = sprintf("DELETE FROM %s %s;",$this->table,$this->where);
			mysql_query($this->sql);
		}
	}
?>