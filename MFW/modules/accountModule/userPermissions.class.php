<?php
	class userPermissions extends moduleAccountsLogs
	{
		var $tableName = "userpermissions";
	
		function readOrWrite()
		{
			if ($this->settingValue() == "111" || $this->settingValue() == "100")
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function write()
		{
			if ($this->settingValue() == "111")
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function settingValue()
		{
			return $this->values["settingValue"];
		}
		
		function getMembershipStatus($userId)
		{
			$this->specificWhere("uaid='".$userId."' AND settingName='member'");
		}
	}
?>