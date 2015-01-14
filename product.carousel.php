<?php
	$productsList = new productList;
	if ($type == "Popular")
	{
		$productsList->orderBy = "totalSold,totalViews";
	}
	$results = $productsList->pullAllResults($where="",$dir="DESC",$limit="0,9");

	$item = '<li class="span4" style="list-style: none;">
	<div class="thumbnail"><div class="caption">
		<h3>'.$type.'</h3>
		<h4>%s</h4>
		<p><img src="img/%s" class="span12" /></p>
		<p>%s</p>
		<p>
			<a href="#" class="modalMake product-btn %s btn btn-sm btn-primary">View</a>
			<a href="#" class="modalMake cart-add-btn %s btn btn-sm btn-primary">Add To Cart (%s)</a>
		</p>
	</div></div></li>';
	$styling = 'style="margin: 0px 0px 0px 0px;padding: 0px 60px;"';
?>
<div id="carousel-generic-<?php echo $type; ?>" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-generic-<?php echo $type; ?>" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-generic-<?php echo $type; ?>" data-slide-to="1"></li>
		<li data-target="#carousel-generic-<?php echo $type; ?>" data-slide-to="2"></li>
	</ol>
 
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<?php
			$i = 0;
			while ($row = mysql_fetch_array($results))
			{
				$currencyType = new currencyType;
				$currencyType->selectPersonalVariables("id",$row["currencyType"]);
				$productImage = new productImages;
				$productImage->selectPersonalVariables("plid",$row["id"]);
				if ($i == 0)
				{
					echo '<div class="item active"><ul class="thumbnails row-fluid" '.$styling.'>';
				}
				else if ($i%3 == 0)
				{
					echo '<div class="item"><ul class="thumbnails row-fluid" '.$styling.'>';
				}
				
				echo sprintf($item,$row["productName"],$productImage->values["imageURL"],$row["productDescription"],$row["id"],$row["id"],$currencyType->values["currencySymbol"].$row["discountPrice"]);
				
				if ($i%3 == 2)
				{
					echo '</ul></div>';
				}
				$i++;
			}
		?>
	</div>
 
	<!-- Controls -->
	<a class="left carousel-control" style="width: 7%;" href="#carousel-generic-<?php echo $type; ?>" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" style="width: 7%;" href="#carousel-generic-<?php echo $type; ?>" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div> <!-- Carousel -->