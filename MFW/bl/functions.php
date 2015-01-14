<?php 
	class functionality
	{
		var $validChars = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","1","2","3","4","5","6","7","8","9","0");
		
		function createRandomString($length)
		{
			$string = "";
			
			while(strlen($string) < $length)
			{
				$string.= $this->validChars[rand(0,61)];
			}
			
			return $string;
		}
		
		function listIterationAsOptions($list)
		{
			$options = "";
			
			foreach($list as $item)
			{
				$options .= "<option value='".$item."'>".$item."</option>";
			}
			
			return $options;
		}
		
		function parseSelected($iterated,$val)
		{
			return str_replace($val."'", $val."' selected",$iterated);
		}
		
		function getRequiredFiles($array)
		{
			foreach($array as $file)
			{
				require_once($file);
			}
		}
		
		function getSpecificSqlRow($results,$column,$id)
		{
			while ($row = mysql_fetch_array($results))
			{
		        if ($row[$column] == $id)
				{
					return $row;
				}
		    }
		}
		
		function aasort(&$arr, $col, $dir = SORT_DESC) {
		    $sort_col = array();
		    foreach ($arr as $key=> $row) {
		        $sort_col[$key] = $row[$col];
		    }
		
		    array_multisort($sort_col, $dir, $arr);
		}
		
		// This function returns Longitude & Latitude from zip code.
		function getLnt($zip){
			$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
			".urlencode($zip)."&sensor=false";
			$result_string = file_get_contents($url);
			$result = json_decode($result_string, true);
			$result1[]=$result['results'][0];
			$result2[]=$result1[0]['geometry'];
			$result3[]=$result2[0]['location'];
			return $result3[0];
		}
		
		function getDistance($zip1, $zip2, $unit = "Miles")
		{
			$first_lat = $this->getLnt($zip1);
			$next_lat = $this->getLnt($zip2);
			$lat1 = $first_lat['lat'];
			$lon1 = $first_lat['lng'];
			$lat2 = $next_lat['lat'];
			$lon2 = $next_lat['lng']; 
			$theta=$lon1-$lon2;
			$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
			cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
			cos(deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;
			$unit = strtoupper($unit);
			
			if ($unit == "K")
			{
				return ($miles * 1.609344)." ".$unit;
			}
			else if ($unit =="N")
			{
				return ($miles * 0.8684)." ".$unit;
			}
			else
			{
				return $miles." ".$unit;
			}
		
		}
	}
?>