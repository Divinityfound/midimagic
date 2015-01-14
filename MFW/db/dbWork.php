<?php
	class dbWork
	{
		var $table;
		var $sql;
		var $where;
		
		function table($data)
		{
			$this->table = $data;
		}
		
		function where($data)
		{
			$this->where = sprintf("WHERE %s",$data);
		}
	}
?>