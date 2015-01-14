<?php
	try
	{
		$customDefine = new customDefine;
		$customDefine->getDefine();
	}
	catch(exception $e)
	{
		define("SIGNATURE", "<br /><br />- Jacob Mathison");
		define("SITENAME", "Mathison Framework 1.1");
		define("ADMINEMAIL", "jacob@mathisonenterprises.com");
	}
?>