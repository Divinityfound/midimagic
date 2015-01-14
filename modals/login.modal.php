<?php
	require_once("/../config.shortcut.php");
	if (METHOD == "POST")
	{
		$user = new useraccounts;
		if (filter_var($post["email"], FILTER_VALIDATE_EMAIL))
		{
			$user->values["email"] = $post["email"];
		}
		else
		{
			$user->values["username"] = $post["email"];
		}
		$user->login();
		if (md5($post["password"].$user->values["salt"]) == $user->values["password"] && $user->values["verification"] == "VERIFIED")
		{
			$func = new functionality;
			$session = new sessionManagement;
			$session->values["uid"] = $user->values["id"];
			$session->values["sessionvalue"] = $func->createRandomString(20);
			$session->values["expiration"] = date("Y-m-d H:i:s", time()+7200);
			$session->insertMap();
			
			$expire = time() + (86400*30);
			setcookie("userSession",$session->values["sessionvalue"], time()+3600, "/","","0");
			header("Location: ".URL."?LOGIN=SUCCESS");
		}
		else
		{
			header("Location: ".URL."?ERROR=INCORRECT%20CREDENTIALS");
		}
	}
?>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
			<form method="POST" action="modals/login.modal.php">
				<div class="modal-body">
					<div class="row-fluid">
						<div class="row span11"></div>
						<div class="row span11">
							<div class="span3">
								Username/Email
							</div>
							<div class="span3">
								<input type="text" name="email" placeholder="Username/Email" />
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
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Login</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>