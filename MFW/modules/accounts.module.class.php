<?php
	class moduleAccountsLogs extends moduleHandler
	{
		var $tableArrays = array(
			"useraccounts" => array(
				"id" => "",
				"username" => "",
				"email" => "",
				"password" => "",
				"salt" => "",
				"verification" => ""),
			"userpermissions" => array(
				"id" => "",
				"uid" => "",
				"settingName" => "",
				"settingValue" => ""),
			"userinfo" => array(
				"id" => "",
				"uaid" => "",
				"tid" => "",
				"firstName" => "",
				"lastName" => "",
				"companyName" => "",
				"companyEmail" => "",
				"companyTitle" => "",
				"address" => "",
				"addressTwo" => "",
				"city" => "",
				"state" => "",
				"zipCode" => "",
				"workNum" => "",
				"cellNum" => "",
				"faxNum" => "",
				"urlAddress" => "",
				"otherInfo" => ""),
			"logchangesystem" => array(
				"id" => "",
				"eventDateTime" => "",
				"ipAddress" => "",
				"uid" => "",
				"logType" => "",
				"logDescription" => "",
				"userSql" => ""),
			"sessionmanagement" => array(
				"id" => "",
				"uid" => "",
				"sessionvalue" => "",
				"expiration" => "")
		);
	}
?>