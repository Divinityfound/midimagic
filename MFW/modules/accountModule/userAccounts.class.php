<?php
	class userAccounts extends moduleAccountsLogs
	{
		var $tableName = "useraccounts";
		
		function accountId($id)
		{
			$this->specificWhere("id='".$id."'");
		}
		
		function login()
		{
			if ($this->values["email"] != "")
			{
				$type = "email";
				$val = $this->values["email"];
			}
			else if ($this->values["username"] != "")
			{
				$type = "username";
				$val = $this->values["username"];
			}
			
			$dbSelect = new dbSelect($type,$val, $this->tableName);
			$result = $dbSelect->execute();
			
			foreach(array_keys($this->values) as $key)
			{
				$this->values[$key] = $result[$key];
			}
		}
		
		function loginApp($post)
		{
			$this->login();
			if (md5($post["password"].$this->values["salt"]) == $this->values["password"] && $this->values["verification"] == "VERIFY")
			{
				$this->values["error"] = "";
				echo json_encode($this->values);
			}
			else
			{
				$this->values["error"] = "Failed to login.";
				echo json_encode($this->values);
			}
			
		}
		
		function register($post)
		{
			if ($post["password"] == $post["repeatPassword"])
			{
				$func = new functionality;
				$this->values["username"] = $post["username"];
				$this->values["email"] = $post["email"];
				$this->values["salt"] = $func->createRandomString(10);
				$this->values["password"] = md5($post["password"].$this->values["salt"]);
				if (ENVIRONMENT == "PROD")
				{
					$this->values["verification"] = $func->createRandomString(20);
				}
				else if (ENVIRONMENT == "DEV")
				{
					$this->values["verification"] = "VERIFIED";
				}
				$this->insertMap();
				
				if (ENVIRONMENT == "PROD")
				{
					$verifyLink = URL."verify.php?v=".$this->values["verification"];
					$email = new email;
					$data = array($post["password"],$verifyLink,$verifyLink);
					$email->constructEmailSend(0,$this->values["email"],$data);
				}
			}
		}
		
		function invite($post)
		{
			if ($post["pass"] == $post["repeatPass"])
			{
				$func = new functionality;
				$this->values["email"] = $post["email"];
				$this->values["password"] = md5($post["pass"]);
				$this->values["verification"] = $func->createRandomString(20);
				$this->insertMap();
				$this->login();
				
				$verifyLink = URL."verify.php?v=".$this->values["verification"];
				$email = new email;
				$data = array($post["pass"],$verifyLink,$verifyLink);
				$email->constructEmailSend(0,$this->values["email"],$data);
				
				$this->cardSent();
				
			}
		}
		
		function cardSent()
		{
			$email = new email;
			$email->constructEmailSend(1,$this->values["email"]);
		}
	}
?>