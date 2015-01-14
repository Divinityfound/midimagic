<?php
	class productList extends moduleECommerce
	{
		var $tableName = "productlist";
		
		function productViewed()
		{
			$this->sanitize("viewedCookie");
			if (isset($_COOKIE["viewedCookie"]))
			{
				$explodedList = explode(".",$_COOKIE["viewedCookie"]);
				if (!in_array($this->values["id"],$explodedList))
				{
					setcookie("viewedCookie",$_COOKIE["viewedCookie"].".".$this->values["id"], time()+86400, "/","","0");
				}
			}
			else
			{
				setcookie("viewedCookie",$this->values["id"], time()+86400, "/","","0");
			}
		}
		
		function addProductToCart()
		{
			if (isset($_COOKIE["cartCookie"]))
			{
				$explodedList = explode(".",$_COOKIE["cartCookie"]);
				if (!in_array($this->values["id"],$explodedList))
				{
					setcookie("cartCookie",$_COOKIE["cartCookie"].".".$this->values["id"], time()+86400, "/","","0");
				}
			}
			else
			{
				setcookie("cartCookie",$this->values["id"], time()+86400, "/","","0");
			}
		}
		
		// Cleans certain cookies so that the data is more readily usable in the event of
		// developer oversight or carelessness.
		function sanitize($cookieName)
		{
			if (isset($_COOKIE[$cookieName]))
			{
				$explodedList = explode(".",$_COOKIE[$cookieName]);
				$newList = array();
				foreach($explodedList as $item)
				{
					if (!in_array($item,$newList))
					{
						array_push($newList,$item);
					}
				}
				$cookieValue = implode(".",$newList);
				
				setcookie($cookieName,$cookieValue, time()+86400, "/","","0");
			}
		}
	}
?>