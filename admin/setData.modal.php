<?php
	require_once("setObject.php");
	
	$idSet = "";
	if (isset($_GET["id"]) && $_GET["id"] != null)
	{
		$idSet = "&id=".$_GET["id"];
		$object->selectPersonalVariables("id",$_GET["id"]);
	}
?>

<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo preg_replace('/([A-Z])/', ' $1', ucfirst($_GET["view"])); ?></h4>
            </div>
			<form method="POST" action="setData.php?view=<?php echo $_GET["view"].$idSet; ?>">
				<div class="modal-body">
					<div class="row-fluid">
						<div class="span5"></div>
						<div class="row-fluid"></div>
<?php
	foreach(array_keys($object->values) as $key)
	{
		if ($key != "id")
		{
			echo "<div class='row-fluid'><div class='span3'><strong>".preg_replace('/([A-Z])/', ' $1', ucfirst($key)).": "."</strong></div>";
			if (strlen($object->values[$key]) > 100)
			{
				echo "<div class='span2'><textarea name='$key' id='$key' style='width: 621px; height: 200px;'>".preg_replace('/\<br(\s*)?\/?\>/i', "",$object->values[$key])."</textarea></div></div>";
			}
			else
			{
				echo "<div class='span2'><input type='text' name='$key' id='$key' value='".$object->values[$key]."' placeholder='".preg_replace('/([A-Z])/', ' $1', ucfirst($key))."' /></div></div>";
			}
		}
	}
?>				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>