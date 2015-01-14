<?php
	require_once("/../config.shortcut.php");
?>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Products Viewed</h4>
            </div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span12"></div>
					<?php
						if (isset($_COOKIE["viewedCookie"]))
						{
							$productsIds = explode(".",$_COOKIE["viewedCookie"]);
							foreach($productsIds as $id)
							{
								$product = new productList;
								$product->selectPersonalVariables("id",$id);
								echo "<div class='span12'><a href='product.page.php?id=$id'>".$product->values["productName"]."</a></div>";
							}
						}
						else
						{
							echo "You have not viewed anything yet!";
						}
					?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>