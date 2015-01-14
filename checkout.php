<?php
	require_once("header.main.php");
?>
	<div id="checkoutArea">
		<div class="row-fluid">
			<div class="span12">
				<div class="span6">
					<h3>Billing Information</h3>
					<div class="span12">
						<div class="span3">
							Credit Card: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Credit Card" maxlength="16" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Expiration: 
						</div>
						<div class="span9">
							<input type="text" placeholder="MMYY" maxlength="4" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Security Code:
						</div>
						<div class="span9">
							<input type="text" placeholder="CVV" maxlength="4" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Card Zip: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Zip Code" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Full Name: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Biller's Address" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Address One: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Billing Address One" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Address Two: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Billing Address Two" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							City: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Billing City" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							State: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Billing State" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Zip Code: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Billing Zip Code" name="creditcard" />
						</div>
					</div>
					<h3>Shipping Information:</h3>
					<div class="span12">
						<div class="span3">
							Same As Billing?
						</div>
						<div class="span9">
							<input type="checkbox" id="sameAsBilling" CHECKED />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Full Name: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Shipping Full Name" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Address One: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Shipping Address One" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Address Two: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Shipping Address Two" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							City: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Shipping City" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							State: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Billing State" name="creditcard" />
						</div>
					</div>
					<div class="span12">
						<div class="span3">
							Zip Code: 
						</div>
						<div class="span9">
							<input type="text" placeholder="Billing Zip Code" name="creditcard" />
						</div>
					</div>
				</div>
				<div class="span6">
					<h3>Sale Breakdown</h3>
					
					<?php
						if (isset($_COOKIE["cartCookie"]))
						{
							$retail = 0;
							$productsIds = explode(".",$_COOKIE["cartCookie"]);
							foreach($productsIds as $id)
							{
								$product = new productList;
								$product->selectPersonalVariables("id",$id);
								$retail += $product->values["discountPrice"];
								echo "<div class='span4'><a href='product.page.php?id=$id'>".$product->values["productName"]."</a></div>";
								echo "<div class='span3 offset4'>".$product->values["discountPrice"]."</div>";
							}
							echo "<div class='span4'>Suggested Retail</div>";
							echo "<div class='span3 offset4'>".number_format($retail,2)."</div>";
							echo "<div class='span4'>Your Price</div>";
							echo "<div class='span3 offset4'><input type='text' id='offeredPrice' class='span8' value='".number_format($retail,2)."' placeholder='0.00' /></div>";
							echo "<div class='span12' id='warningMessage'></div><div class='span10'><button type='button' id='submit' name='submit' class='btn btn-primary btn-block'>Checkout</button></div>";
						}
						else
						{
							echo "You have not carted anything yet!";
						}
					?>
				</div>
			</div>
		</div>
	</div>
<?php
	require_once("footer.main.php");
?>