<?php
	class musicScore extends musicScoreModule
	{
		var $tableName = "musicscore";

		var $musicSections = array();

		public function breakScoreDown(){
			$brokenArray = split("MTrk",$this->values['musicscore']);
			$this->musicSections[0] = $brokenArray[0];
			$this->musicSections[1] = $brokenArray[1];
			$i = 0;
			foreach ($brokenArray as $key => $sections) {
				if ($key > 1)
				{
					$this->musicSections[2][$i] = $sections;
					$i++;
				}
			}
		}

		public function putScoreTogether(){

		}
	}
?>