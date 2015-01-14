<?php
	class dbSelect extends dbWork
	{
		var $selected = "*";
		var $orderBy;
		var $limit;
		
		function __construct($type = null,$val = null,$tableName = null)
		{
			if ($val != null)
			{
				$this->selected("*");
				$this->table($tableName);
				$this->where($type."='".$val."'");
			}
		}
		
		function selected($data)
		{
			$this->selected = $data;
		}
		
		function orderBy($data,$dir)
		{
			$this->orderBy = sprintf("ORDER BY %s %s",$data,$dir);
		}
		
		function limit($limitDetails)
		{
			$this->limit = sprintf("Limit %s",$limitDetails);
		}
		
		function execute()
		{
			$this->sql = sprintf("SELECT %s FROM %s %s %s %s;",$this->selected,$this->table,$this->where,$this->orderBy,$this->limit);
			if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
			{
				echo $this->sql."<br />";
			}
			$firstResult = mysql_query($this->sql);
			
			if (!$firstResult)
			{
				$result = null;
			}
			else
			{
				$result = mysql_fetch_assoc($firstResult);
			}
			
			return $result;
		}
		
		function executeArray()
		{
			$this->sql = sprintf("SELECT %s FROM %s %s %s %s;",$this->selected,$this->table,$this->where,$this->orderBy,$this->limit);
			if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
			{
				echo $this->sql."<br />";
			}
			$results = mysql_query($this->sql);
			return $results;
		}
	}
?>