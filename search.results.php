<?php
	require_once("config.shortcut.php");
	$productList = new productList;
	$productList->orderBy = "totalSold,totalViews";
	
	$displayPage = 9;
	if (isset($_GET["page"]))
	{
		$currentPage = $_GET["page"];
	}
	else
	{
		$currentPage = 1;
	}
	
	if (isset($_GET["desc"]))
	{
		$products = $productList->pullAllResults($where = "queryString='".$_GET["desc"]."'",$dir = "DESC",$limit = ($currentPage-1)*$displayPage.",".$displayPage);
		$totalProducts = $productList->countQuantity($where = "queryString='".$_GET["desc"]."'");
		define("SEARCHURL","search.php?desc=".$_GET["desc"]);
	}
	
	$productSort = "Popular";
	$productPrice = "Any";
	$productGender = "Female";
	$pageCount = $totalProducts/$displayPage;

	$thumbNail = '<ul class="thumbnails row-fluid"><li class="span12" style="list-style: none;">
	 <div class="thumbnail">
	 <div class="caption">
	 <h3>%s</h3>
	 <p><img src="img/%s" class="span12" /></p>
	 <p>%s</p>
	 <p><a href="#" class="modalMake product-btn %s btn btn-sm btn-primary">View</a>
	 <a href="#" class="modalMake cart-add-btn %s btn btn-sm btn-primary">Add To Cart (%s)</a></p>
	 </div>
	 </div></li></ul>';
	 
	$prevNext = '<div class="span12" style="text-align: center;"><ul class="pagination pagination-sm">%s</ul></div>';
	require_once("search.pagination.php");
	echo "<div class='span12'></div>";
	echo $prevNext;
	$i = 0;
	if ($products != null)
	{
		while ($row = mysql_fetch_array($products))
		{
			$currencyType = new currencyType;
			$currencyType->selectPersonalVariables("id",$row["currencyType"]);
			$productImage = new productImages;
			$productImage->selectPersonalVariables("plid",$row["id"]);
			
			if ($i%3 == 0)
			{
				echo "<div class='span12'>";
			}
			
			echo sprintf("<div class='span4' style='text-align: center;'>%s</div>",sprintf($thumbNail,$row["productName"],$productImage->values["imageURL"],$row["productDescription"],$row["id"],$row["id"],$currencyType->values["currencySymbol"].$row["discountPrice"]));
			if ($i%3 == 2)
			{
				echo "</div>";
			}
			$i++;
		}
	}
	if ($i%3 == 1)
	{
		echo "<div class='span4'></div>";
	}
	echo $prevNext;
?>