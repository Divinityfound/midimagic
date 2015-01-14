<?php
	class moduleHandler
	{
		var $values;
		var $orderBy = false;
		
		function __construct()
		{
			$this->values = $this->tableArrays[$this->tableName];
			$this->testTableExistence();
			$this->autoComment($this->tableName." has been instantiated.");
		}
		
		function autoComment($comment)
		{
			if (isset($_GET["COMMENT"]) && $_GET["COMMENT"] == "TRUE")
			{
				echo "<!-- ".$comment." -->";
			}
		}
		
		function testTableExistence()
		{
			// TEST TABLE EXISTENCE
			if(mysql_query("DESCRIBE `".$this->tableName."`"))
			{
				// TEST COLUMN EXISTENCE
			    foreach(array_keys($this->values) as $key)
				{
					mysql_query("ALTER IGNORE TABLE ".$this->tableName." ADD ".$key." VARCHAR(100);");
				}
			}
			else
			{
				$sql = "CREATE TABLE ".$this->tableName." (%s)";
				$sqlColumns = "";
				foreach(array_keys($this->values) as $key)
				{
					if ($key == "id")
					{
						$sqlColumns .= "id INT(10) NOT NULL AUTO_INCREMENT";
					}
					else if ($key == "sid" || $key == "uid" || $key == "nid" || $key == "bid" || $key == "vid" || $key == "tid")
					{
						$sqlColumns .= $key." INT(10) NOT NULL";
					}
					else
					{
						$sqlColumns .= $key." VARCHAR(100) NULL";
					}
					
					if ($key != end(array_keys($this->values)))
					{
						$sqlColumns .= ",";
					}
					else
					{
						$sqlColumns .= ",PRIMARY KEY (id)";
					}
				}
				mysql_query(sprintf($sql,$sqlColumns));
				if (isset($_GET["DEBUG"]) && $_GET["DEBUG"] == "TRUE")
				{
					echo sprintf($sql,$sqlColumns);
				}
			}
		}
		
		function pullAllResults($where = "", $dir = "ASC", $limit = "")
		{
			$sql = new dbSelect;
			$sql->selected("*");
			$sql->table($this->tableName);
			if ($where != "")
			{
				$sql->where($where);
			}
			if ($this->orderBy != false)
			{
				$sql->orderBy($this->orderBy,$dir);
			}
			if ($limit != "")
			{
				$sql->limit($limit);
			}
			
			$results = $sql->executeArray();
			$this->autoComment($this->tableName." has pulled all results in ".$dir." order");
			return $results;
		}
		
		function countQuantity($where = "")
		{
			$sql = new dbCount;
			$sql->table($this->tableName);
			if ($where != "")
			{
				$sql->where($where);
			}
			$sql->execute();
			return $sql->total;
		}
		
		function selectPersonalVariables($type="id",$val)
		{
			$sql = new dbSelect;
			$sql->selected("*");
			$sql->table($this->tableName);
			$sql->where($type."='".$val."'");
				
			$result = $sql->execute();
			
			foreach(array_keys($this->values) as $key)
			{
				$this->values[$key] = $result[$key];
			}
			$this->autoComment($this->tableName." object was populated now.");
		}
		
		function selectDistinctSelected($selected,$where = null,$dir = "ASC")
		{
			$sql = new dbSelect;
			$sql->selected("DISTINCT ".$selected);
			$sql->table($this->tableName);
			
			if ($where != null)
			{
				$sql->where($where);
			}
			
			if ($this->orderBy != false)
			{
				$sql->orderBy($this->orderBy,$dir);
			}
			
			$results = $sql->executeArray();
			$this->autoComment($this->tableName." distinct result list created.");
			return $results;
		}
		
		function specificWhere($where)
		{
			$sql = new dbSelect;
			$sql->selected("*");
			$sql->table($this->tableName);
			$sql->where($where);
				
			$result = $sql->execute();
			
			foreach(array_keys($this->values) as $key)
			{
				$this->values[$key] = $result[$key];
			}
			$this->autoComment($this->tableName." object was populated now.");
		}
		
		function insertMap()
		{
			$variables = "";
			$valueSet = "";
			$sql = new dbInsert;
			$sql->table($this->tableName);
			foreach(array_keys($this->values) as $key)
			{
				if ($key != "id")
				{
					$variables.= $key;
					$valueSet .= sprintf("'%s'",mysql_real_escape_string(nl2br($this->values[$key])));
					
					if ($key != end(array_keys($this->values)))
					{
						$variables .= ",";
						$valueSet  .= ",";
					}
				}
			}
			$sql->variables($variables);
			$sql->values($valueSet);
			$sql->execute();
			$this->logActivity($sql->sql);
			$this->autoComment($this->tableName." object was inserted now.");
		}
		
		function updateMap()
		{
			$sql = new dbUpdate;
			$sql->table($this->tableName);
			$sql->where("id='".$this->values["id"]."'");
			$set = "";
			foreach(array_keys($this->values) as $key)
			{
				if ($key != "id")
				{
					$set .= $key."='".mysql_real_escape_string(nl2br($this->values[$key]))."'";
					
					if ($key != end(array_keys($this->values)))
					{
						$set .= ",";
					}
				} 
			}
			$sql->set($set);
			$sql->execute();
			$this->logActivity($sql->sql);
			$this->autoComment($this->tableName." object was updated now.");
		}
		
		function deleteMap()
		{
			$sql = new dbDelete;
			$sql->table($this->tableName);
			$sql->where("id=".$this->values["id"]);
			$sql->execute();
			$this->autoComment($this->tableName." object was deleted now.");
		}
		
		function moduleDump()
		{
			echo var_dump($this->tableArrays)."<br /><br />";
			echo $this->tableName."<br /><br />";
			echo var_dump($this->values)."<br /><br />";
		}
		
		function logActivity($sql)
		{
			if (isset($_COOKIE["userSession"]))
			{
				$user = new userAggregateProfile;
				$log = new logChangeSystem;
				$log->setUID($user);
				$log->logRecord($user->user->values["email"],$this->tableName,$sql);
				$this->autoComment($this->tableName." object activity was recorded now.");
			}
		}
	}
?>