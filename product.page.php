<?php
	require_once("header.main.php");
	$product = new productList;
	$product->selectPersonalVariables("id",$_GET["id"]);
	$product->values["totalViews"]++;
	$product->updateMap();
	$product->productViewed();
?>
	<div class="row-fluid">
		<div class="span12">
			<h3><?php echo "<a href='".URL."'>".SITENAME."</a>"; ?> | Department | <?php echo "<a href='search.php?desc=".$product->values["queryString"]."'>".ucfirst($product->values["queryString"])."</a> | ".$product->values["productName"]; ?></h3>
		</div>
		<div class="span12">
			<div class="span8">
				<div class="span12">
					<div class="span12"></div>
					<div class="span12" style="text-align: center;">
						<?php
							require_once("product.image.carousel.php");
						?>
					</div>
				</div>
			</div>
			<div class="span4" style="text-align: right;padding: 0px 30px 0px 0px;">
				<div class="span12"></div>
				<div class="span3" style="text-align: left;">
					<?php
						require_once("socialMedia/facebook.sm.php");
						echo "<br />";
						require_once("socialMedia/twitter.sm.php");
						echo "<br />";
						require_once("socialMedia/pinterest.sm.php");
						echo "<br />";
						require_once("socialMedia/googlePlus.sm.php");
					?>
				</div>
				<div class="span8">
					<div class="span12">
						<button type="button" class="modalMake cart-add-btn <?php echo $_GET["id"]; ?> btn btn-primary">Add To Cart</button>
						<button type="button" class="btn btn-primary">Checkout</button>
					</div>
					<div class="span12">
						<div class="span8">
							<strong>Original Price</strong>
						</div>
						<div class="span4">
							<?php
								echo $product->values["displayPrice"];
							?>
						</div>
					</div>
					<div class="span12">
						<div class="span8">
							<strong>Discount Price</strong>
						</div>
						<div class="span4">
							<?php
								echo $product->values["discountPrice"];
							?>
						</div>
					</div>
					<div class="span12">
						<div class="span8">
							<strong>Savings</strong>
						</div>
						<div class="span4">
							<?php
								echo (($product->values["discountPrice"]*100-$product->values["discountPrice"]%$product->values["displayPrice"])/$product->values["displayPrice"])."%";
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="span12">
			<div class="span4">
				<h4>Product Details</h4>
				<?php
					echo $product->values["productDetails"];
				?>
			</div>
			<div class="span8">
				<h4>Description:</h4>
				<?php
					echo $product->values["productDescription"];
				?>
			</div>
		</div>
		<div class="span12"></div>
	</div>
<?php
	require_once("footer.main.php");
?>