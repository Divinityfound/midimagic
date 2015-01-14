<?php
	class moduleECommerce extends moduleHandler
	{
		var $tableArrays = array(
			"productlist" => array(
				"id" => "",
				"productName" => "",
				"productDescription" => "",
				"productDetails" => "",
				"gender" => "",
				"season" => "",
				"productType" => "",
				"queryString" => "",
				"productId" => "",
				"currencyType" => "",
				"baseCost" => "",
				"minimumSale" => "",
				"discountPrice" => "",
				"displayPrice" => "",
				"totalViews" => "",
				"totalSold" => ""),
			"productimages" => array(
				"id" => "",
				"plid" => "",
				"imageURL" => ""),
			"productorders" => array(
				"id" => "",
				"uid" => "",
				"orderId" => "",
				"plidList" => "",
				"baseCost" => "",
				"minimumSale" => "",
				"totalSale" => "",
				"orderStatus" => ""),
			"pointdollars" => array(
				"id" => "",
				"uid" => "",
				"oid" => "",
				"pointsRemaining" => ""),
			"currencytype" => array(
				"id" => "",
				"countryCode" => "",
				"currencyName" => "",
				"currencySymbol" => "",
				"currencyValue" => ""),
		);
	}
?>