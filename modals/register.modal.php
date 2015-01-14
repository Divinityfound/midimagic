<?php
	require_once("/../config.shortcut.php");
	if (METHOD == "POST")
	{
		$newUser = new userAccounts;
		$newUser->register($post);
		header("Location: ".URL);
	}
?>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Register</h4>
            </div>
			<form method="POST" action="modals/register.modal.php">
				<div class="modal-body">
					<div class="row-fluid">
						<div class="row span11"></div>
						<div class="row span11">
							<div class="span3">
								Username
							</div>
							<div class="span3">
								<input type="text" name="username" placeholder="Username" />
							</div>
						</div>
						<div class="row span11">
							<div class="span3">
								Email
							</div>
							<div class="span3">
								<input type="text" name="email" placeholder="Email" />
							</div>
						</div>
						<div class="row span11">
							<div class="span3">
								Password
							</div>
							<div class="span3">
								<input type="password" name="password" placeholder="Password" />
							</div>
						</div>
						<div class="row span11 ">
							<div class="span3">
								Repeat Password
							</div>
							<div class="span3">
								<input type="password" name="repeatPassword" placeholder="Repeat Password" />
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>