<?php
	require_once("/../config.shortcut.php");
?>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $user->user->values["username"]." - ".$user->user->values["email"]." Menu"; ?></h4>
            </div>
				<div class="modal-body">
					<div class="row-fluid" style="text-align: center;">
						<div class="row span12"></div>
						<div class="span3 offset1"><a href="#">Orders</a></div>
						<div class="span3"><a href="#">Shipping Info</a></div>
						<div class="span3"><a href="#">Account Settings</a></div>
						<div class="span3 offset1"><a href="#">Point Dollars</a></div>
						<div class="span3"><a href="logout.php">Logout</a></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
	</div>
</div>