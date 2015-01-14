<?php

?>
<div class="row-fluid">
	<div class="input-group-addon row">
		<div class="col-lg-6">
			<form class="form-group">
				<div class="input-group col-lg-12" style="width: 100%;">
					<input type="text" placeholder="Enter SKU# or Product Name" class="search-query col-lg-8 form-control">
					<div class="input-group-btn"><button type="button" class="btn btn-primary">Search</button></div>
				</div>
			</form>
		</div>
		<div class="col-lg-offset-1 col-lg-5">
			<form class="form-inline">
				<?php
					$viewCount = 0;
					if (isset($_COOKIE["viewedCookie"]))
					{
						$viewed = explode(".",$_COOKIE["viewedCookie"]);
						$viewCount = count($viewed);
					}
					$cartCount = 0;
					if (isset($_COOKIE["cartCookie"]))
					{
						$cart = explode(".",$_COOKIE["cartCookie"]);
						$cartCount = count($cart);
					}
				?>
				 <button type="button" style="width: 90px;" class="modalMake viewed-btn btn btn-primary">Viewed (<?php echo $viewCount; ?>)</button>
				 <button type="button" style="width: 90px;" class="modalMake cart-btn btn btn-primary">Cart (<?php echo $cartCount ?>)</button>
				<?php
					if (isset($user->user))
					{
						echo '<button type="button" class="modalMake account-btn btn btn-primary">'.$user->user->values["username"].'\'s Account</button>';
					}
					else
					{
				?>
				 <button type="button" style="width: 90px;" class="modalMake sign-in-btn btn btn-primary">Sign in</button>
				 <button type="button" style="width: 90px;" class="modalMake sign-up-btn btn btn-primary">Register</button>
				<?php
					}
				?>
			</form>
		</div>
	</div>
</div>