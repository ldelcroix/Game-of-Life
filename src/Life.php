<?php

class Life
{
	static public function newCellState ($sumNeighbors, $state) {

		if($state == 1) {

			return ($sumNeighbors == 2 || $sumNeighbors == 3) ? 1 : 0;

		} else {

			return ($sumNeighbors == 3) ? 1 : 0;
		}
	}

	static public function getNeighbors ($array, $i, $j) {
	
		$neighbors = array();

		$neighbors[0] = isset($array[$i-1][$j-1]) ? $array[$i-1][$j-1] : 0;
		$neighbors[1] = isset($array[$i-1][$j  ]) ? $array[$i-1][$j  ] : 0;
		$neighbors[2] = isset($array[$i-1][$j+1]) ? $array[$i-1][$j+1] : 0;

		$neighbors[3] = isset($array[$i  ][$j-1]) ? $array[$i  ][$j-1] : 0;

		$neighbors[4] = isset($array[$i  ][$j+1]) ? $array[$i  ][$j+1] : 0;

		$neighbors[5] = isset($array[$i+1][$j-1]) ? $array[$i+1][$j-1] : 0;
		$neighbors[6] = isset($array[$i+1][$j  ]) ? $array[$i+1][$j  ] : 0;
		$neighbors[7] = isset($array[$i+1][$j+1]) ? $array[$i+1][$j+1] : 0;

		return $neighbors;
	}

	static public function newArrayState ($array) {
	
		$new = array();

		foreach ($array as $i => $line) {

			$new[$i] = array();

			foreach ($line as $j => $cell) {

				$neighbors = self::getNeighbors($array, $i, $j);

				$new[$i][$j] = self::newCellState(array_sum($neighbors), $cell);
			}			
		}

		return $new;
	}

	static public function printArray ($table) {
	
		foreach ($table as $line) {

			foreach ($line as $cell) {

				echo $cell.' ';
			}

			echo '<br>';
		}
	}

	static public function printArrayTable ($table) {

		echo "<meta http-equiv='refresh' content='1'>";
	
		echo "<style>table { border-collapse: collapse; empty-cells: show; } tr { height:21px; } td { width:20px; height:20px; border:1px solid grey; padding:0; margin:0; } .alive{ background-color:black; }</style>";

		echo "<table cellpadding='0' cellspacing='0'>";

		foreach ($table as $line) {

			echo "<tr>";

			foreach ($line as $cell) {

				echo "<td class='" . (($cell == 1) ? "alive" : "dead") . "'></td>";
			}

			echo '</tr>';
		}

		echo "</table>";
	}

	static public function getFileArray () {
	
		$file = file_get_contents(TEMP_FILE_ARRAY);

		$array = unserialize($file);

		return $array;
	}

	static public function setFileArray ($array) {

		$string = serialize($array);
	
		$file = file_put_contents(TEMP_FILE_ARRAY, $string);
	}

}