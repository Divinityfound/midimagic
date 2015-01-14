<?php
	class customData extends moduleHandler
	{
		var $tableArrays = array(
			"custompages" => array(
				"id" => "",
				"queryString" => "",
				"pageTitle" => "",
				"pageHeader" => "",
				"pageHtml" => ""),
			"socialmedia" => array(
				"id" => "",
				"socialNetwork" => "",
				"imageSN" => "",
				"urlOfSN" => "",
				"usernameOfSN" => ""),
			"footerlinks" => array(
				"id" => "",
				"header" => "",
				"textData" => "",
				"URL" => "",
				"linkOrder" => ""),
			"customdefine" => array(
				"id" => "",
				"defineVar" => "",
				"defineData" => "")
		);
	}
?>