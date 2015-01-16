<?php
	if(class_exists("customDefine")) {
		$customDefine = new customDefine;
		$customDefine->getDefine();
	}
	else
	{
		define("SIGNATURE", "<br /><br />- Jacob Mathison");
		define("SITENAME", "Mathison Framework 1.2");
		define("ADMINEMAIL", "jacob@mathisonenterprises.com");
	}
?>