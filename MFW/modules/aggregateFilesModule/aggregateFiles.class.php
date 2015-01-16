<?php
	// DO NOT EDIT
	class aggregateFiles extends moduleFilesAggregate
	{
		var $tableName = "aggregatefiles";
		
		function __construct()
		{
			$this->values = $this->tableArrays[$this->tableName];
			if (!isset($_GET["view"]))
			{
				$this->testTableExistence();
				$this->autoComment($this->tableName." has been instantiated.");
				$this->selectPersonalVariables("id", 1);
				if ($this->values["id"] == "")
				{
					$this->install();
				}
				
			}
			$this->getFiles();
		}
		
		function install()
		{
			$this->values["file"] = "menus.module";
			$this->insertMap();
			$this->values["folder"] = "menuModule";
			$this->values["file"] = "adminMenu";
			$this->insertMap();
			$this->getFiles();
			$adminMenu = new adminMenu;
			$adminMenu->values["subMenu"] = "Menu";
			$adminMenu->values["displayText"] = "Admin Menu";
			$adminMenu->values["URL"] = "viewData.php?view=adminMenu";
			$adminMenu->values["active"] = "true";
			$adminMenu->insertMap();
				
			$adminMenu->values["subMenu"] = "Aggregate Files";
			$adminMenu->values["displayText"] = "Required Files";
			$adminMenu->values["URL"] = "viewData.php?view=aggregateFiles";
			$adminMenu->values["active"] = "true";
			$adminMenu->insertMap();
		}
		
		function getFiles()
		{
			$results = $this->pullAllResults();
			while ($row = mysql_fetch_array($results))
			{
				$folder = $row["folder"]."/";
				require_once(dirname(__FILE__)."/../".$folder.$row["file"].".class.php");
			}
		}
	}
?>