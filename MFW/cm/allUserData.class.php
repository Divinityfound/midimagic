<?php
	class userAggregateProfile
	{
		var $session;
		var $user;
		
		function __construct($search = false,$commit = true)
		{
			if ($commit == true)
			{
				if (isset($_COOKIE["userSession"]) && $_COOKIE["userSession"] != null)
				{
					$this->session = new sessionManagement;
					$this->session->selectPersonalVariables("sessionValue",$_COOKIE["userSession"]);
					if ($this->session->values["expiration"] > date("Y-m-d H:i:s"))
					{
						$this->setData($this->session->values["uid"]);
					}
					else
					{
						if(isset($_COOKIE['userSession']))
						{
							unset($_COOKIE['userSession']);
							setcookie('userSession', '', time() - 3600, "/","","0"); // empty value and old timestamp
							header("Location:".URL);
						}
					}
				}
			}
		}
		
		function profileUsername($username)
		{
			if (filter_var($username, FILTER_VALIDATE_EMAIL))
			{
				$this->user->values["email"] = $username;
			}
			else
			{
				$this->user->values["username"] = mysql_real_escape_string(str_replace("%20", " ",$username));
			}
			$this->user->login();
			$this->setData($this->user->values["id"]);
		}
		
		function setData($uid)
		{
			if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
			{
				echo "<br />START SET DATA OF allUserData<br />";
			}
			
			$this->user = new userAccounts;
			$this->user->selectPersonalVariables("id", $uid);
			
			if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
			{
				echo "<br />END SET DATA OF allUserData<br /><br />";
			}
		}
	}
?>