<?php
	class userInfo extends moduleAccountsLogs
	{
		var $tableName = "userinfo";
		
		function addInfo($post,$userId)
		{
			$this->getInfoByUaid($userId);
			$this->values["tid"] = 0;
			$this->values["firstName"] = $post["fName"];
			$this->values["lastName"] = $post["lName"];
			$this->values["companyName"] = $post["companyName"];
			$this->values["companyEmail"] = $post["companyEmail"];
			$this->values["companyTitle"] = $post["companyTitle"];
			$this->values["address"] = $post["address"];
			$this->values["addressTwo"] = $post["addressTwo"];
			$this->values["city"] = $post["city"];
			$this->values["state"] = $post["state"];
			$this->values["zipCode"] = $post["zipCode"];
			$this->values["workNum"] = $post["workNum"];
			$this->values["cellNum"] = $post["cellNum"];
			$this->values["faxNum"] = $post["faxNum"];
			$this->values["urlAddress"] = $post["urlAddress"];
			
			if ($this->values["id"] != "")
			{
				$this->updateMap();
			}
			else
			{
				$this->values["uaid"] = $userId;
				$this->insertMap();
			}
		}
		
		function getInfoByUaid($userId)
		{
			$this->selectPersonalVariables("uaid", $userId);
		}
	}
?>