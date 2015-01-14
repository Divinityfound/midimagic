<?php
	require_once("/../config.shortcut.php");
	$product = new productList;
	$product->selectPersonalVariables("id",$_GET["id"]);
	$product->values["totalViews"]++;
	$product->updateMap();
	$product->productViewed();
?>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $product->values["productName"]; ?> - #SKU-<?php echo $product->values["gender"].$product->values["productType"].$product->values["productId"] ?></h4>
            </div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span6 offset6">
					<?php
						require_once("/../socialMedia/facebook.sm.php");
						require_once("/../socialMedia/twitter.sm.php");
						require_once("/../socialMedia/pinterest.sm.php");
						require_once("/../socialMedia/googlePlus.sm.php");
					?>
					</div>
					<div class="span12">
						<div class="span12"></div>
						<div class="span12">
							<div class="span11">
								<?php
									require_once("/../product.image.carousel.php");
								?>
							</div>
						</div>
						<div class="span12">
							<h5>Description:</h5>
							<?php
								echo $product->values["productDescription"];
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<?php
					echo "Original Price: ".$product->values["displayPrice"];
				?>
				<a href="product.page.php?id=<?php echo $product->values["id"]; ?>" class="btn btn-primary">More Info</a>
				<button type="button" class="btn btn-primary">Checkout</button>
				<button type="button" class="btn btn-primary">Add To Cart (<?php
					echo $product->values["discountPrice"];
				?>)</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>