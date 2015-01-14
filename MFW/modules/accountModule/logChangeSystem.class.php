<?php
	class logChangeSystem extends moduleAccountsLogs
	{
		var $tableName = "logchangesystem";
		var $defaultRecord = "%s ACCESSED AND MODIFIED %s ON %s FROM %s.";
		
		function setUID($user)
		{
			$this->values["uid"] = $user->user->values["id"];
			$this->values["ipAddress"] = $_SERVER['REMOTE_ADDR'];
		}
		
		function logRecord($email,$table,$sql)
		{
			if ($table != "logchangesystem")
			{
				$this->values["logType"] = $table;
				$this->values["eventDateTime"] = date("Y-m-d H:i:s");
				$this->values["logDescription"] = sprintf($this->defaultRecord,$email,$table,$this->values["eventDateTime"],$this->values["ipAddress"]);
				$this->values["userSql"] = mysql_real_escape_string($sql);
				$this->insertMap();
			}
		}
	}
?>