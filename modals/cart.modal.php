<?php
	require_once("/../config.shortcut.php");
	if (isset($_GET["id"]))
	{
		$product = new productList;
		$product->values["id"] = $_GET["id"];
		$product->addProductToCart();
	}
?>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
            </div>
			<div class="modal-body">
				
				<div class="row-fluid">
					<div class="span12"></div>
					<?php
						if (isset($_COOKIE["cartCookie"]))
						{
							$productsIds = explode(".",$_COOKIE["cartCookie"]);
							$retailPrice = 0;
							echo "<div class='span2'>Remove</div><div class='span3'>Products</div><div class='span3 offset3'>Retail</div>";
							foreach($productsIds as $id)
							{
								$product = new productList;
								$product->selectPersonalVariables("id",$id);
								$retailPrice += $product->values["discountPrice"];
								echo "<div class='span2'><a href='#'><i class='glyphicon glyphicon-remove'></i></a></div>";
								echo "<div class='span3'><a href='product.page.php?id=$id'>".$product->values["productName"]."</a></div>";
								echo "<div class='span3 offset3'>".$product->values["discountPrice"]."</div>";
							}
							echo "<div class='span2 offset8'>".number_format($retailPrice,2)."</div>";
						}
						else
						{
							echo "You have not carted anything yet!";
						}
					?>
				</div>
			</div>
			<div class="modal-footer">
				<a href="checkout.php" class="btn btn-primary">Checkout</a>
				<button type="button" class="btn btn-primary">Clear Cart</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>