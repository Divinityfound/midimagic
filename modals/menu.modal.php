<?php
	require_once("/../config.shortcut.php");
	$menuCategory = new menuCategory;
	$menuCategory->selectPersonalVariables("id",$_GET["id"]);
?>

<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $menuCategory->values["categoryText"]; ?> Menu</h4>
            </div>
			<div class="modal-body">
				<?php
					$userMenu = new userMenu;
					$userMenu->displayMenu();
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>