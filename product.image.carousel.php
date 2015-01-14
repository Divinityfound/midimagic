<?php
	$images = new productImages;
	$results = $images->pullAllResults($where = "plid=".$_GET["id"]);
	$i = 0;
	$carouselItems = "";
	$itemStyling = "style='margin: 0px auto;padding: 0px 75px;'";
	while ($row = mysql_fetch_array($results))
	{
		$i++;
		if ($i == 1)
		{
			$carouselItems .= "<div class='item active'><img src='".URL."img/".$row["imageURL"]."' $itemStyling /></div>";
		}
		else
		{
			$carouselItems .= "<div class='item'><img src='".URL."img/".$row["imageURL"]."' $itemStyling /></div>";
		}
	}
?>

<div id="carousel-header-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-header-generic" data-slide-to="0" class="active"></li>
	<?php
		for ($j = 1;$j < $i;$j++)
		{
			echo '<li data-target="#carousel-header-generic" data-slide-to="'.$j.'"></li>';
		}
	?>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php
		echo $carouselItems;
	?>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-header-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-header-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->