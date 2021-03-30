<!DOCTYPE html>
<html>
	<body>
		<?php
/*
* Cody Syring
* Project: https://open.kattis.com/problems/neighborhoodwatch
* Calculates if the trip you are going to take down the road
* Will pass a neighborhood watch house
*/
			#Default answers given in the problem
			$numHouse = 5;
			$numSafe = 2;
			$safeLocation = array(1,4);
			
			#$numHouse,$numSafe,$safeLocation passed in
			function calcSafe($nH,$nS,$sL){
				$numSafeRoute = 0;
				$housesPassed = array();
				#Nested loop so i can create sets for everysingle possible trip
				for($startHouse = 1; $startHouse < $nH; $startHouse++){
					for($toHouse = $startHouse+1; $toHouse <= $nH; $toHouse++){
						$housesPassed= createSet($startHouse,$toHouse);
						
						if(hasSafeHouse($sL,$housesPassed)){
							$numSafeRoute++;
						}
		
					}
				}
				$numSafeRoute= $numSafeRoute+(Count($sL));
				return $numSafeRoute;
			}
			#Compares two lists to see if a safe house is in route
			function hasSafeHouse($safeHouses,$trip){
				foreach($safeHouses as &$cur){
					if(in_array($cur,$trip)){
						return true;
					}
				}
				return false;
			}
			#creates a set for the path taken
			function createSet($start, $end){
				$holdArray = array();
				for($start; $start<= $end; $start++){
					array_push($holdArray,$start);				
				}
				#print_r($holdArray);
				return $holdArray;				
			}
			
			$total = calcSafe($numHouse,$numSafe,$safeLocation);
			
			#print the input data
			echo ("Input: <br>".$numHouse." ".$numSafe."<br>");
			foreach($safeLocation as &$cur){
				echo ($cur."<br>");
			}
			#print the output data
			echo ("<br>Output: <br>".$total);
		?>
	</body>
</html>