<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use League\Csv\Reader;
use PhpUnstructuredTextParser\TextParser;
// require_once base_path('vendor/aymanrb/php-unstructured-text-parser/src/TextParserClass.php');


class Eplus extends Model
{ 
    
    public static function generateFiles($idf_path, $weather_path)
    {
		$idd = "/usr/local/EnergyPlus-8-5-0/Energy+.idd";
		$success = true;
		$data = array();

		$command = "energyplus -i ".$idd." -x -s C -w ".$weather_path." -d output ".$idf_path;
		$process = new Process($command);
		$process->setTimeout(0);

		try {
			$process->mustRun();
			$result = $process->getOutput();
		} catch (ProcessFailedException $e) {
			$result = $e->getMessage();
			$success = false;
		}

		if ($success)
		{
            //I broke this here
            //$data = self::readMeterCSV();
            $data = "it ran just fine this should be a real message";
		}

		return compact('success', 'data');
    }

    /**
     * Read the file with the extesion .mdd
     *
     * @return array Meter Objects 
     */
    private static function readMdd()
    {
    	$meter_objects = array();
    	$path_mdd = public_path('output/eplus.mdd');
    	$lines = file($path_mdd);

    	foreach ($lines as $key => $value) {
    		$value = str_replace("\n", "", $value);
    		
    		if (substr($value, 0, 1) !== '!') {
    			$values = explode(',', $value);
    			$meter = $values[0];

    			if($meter === 'Output:Meter') {			// Ignore meter cumulative
    				$meter_objects[] = $values[1];
    			}
    		}
    	}

    	return $meter_objects;
    }

    /**
     * Read the file with extension .mtr
     *
     * @param array Meter objects
     * @return array Rows info
     */
    private static function readMtr($meter_objects)
    {
    	$rows_info = array();
    	$row = 1;
    	$dictionary = array();
    	$current_environment = '';
    	$path_mtr = public_path('output/eplus.mtr');
    	$lines = file($path_mtr);

    	foreach ($lines as $key => $value) {
    		$value = str_replace("\n", "", $value);
    		unset($lines[$key]);

    		if ($value == "End of Data Dictionary") {
    			break;
    		}

    		$values = explode(',', $value);

    		$title = $values[2];
    		$title_explode = explode(' ', $title);

    		$is_environment = strpos($title, 'Environment') !== false;	//Doing this because I do not know if the index 1 is for environment

    		$is_meter_object = in_array($title_explode[0], $meter_objects);

    		$is_day_simulation = strpos($title, 'Day of Simulation') !== false;

    		$dictionary[$values[0]] = array(
    			'title' => $title,
    			'is_environment' => $is_environment,
    			'is_meter_object' => $is_meter_object,
    			'is_day_simulation' => $is_day_simulation
    		);
    	}

    	foreach ($lines as $key => $value) {
    		$value = str_replace("\n", "", $value);

    		if ($value == "End of Data") {
    			break;
    		}

    		$values = explode(',', $value);

    		$data_dictionary = $dictionary[$values[0]];

    		if ($data_dictionary['is_environment']) {
    			$current_environment = str_replace(' ', '_', $values[1]);
    		}

    		if ($data_dictionary['is_day_simulation']) {
    			$day_type = end($values);
    			$month = sprintf("%02d", $values[2]);
    			$day = sprintf("%02d", $values[3]);
    			$hour = sprintf("%02d", $values[5]);

    			$date = "{$month}/{$day} {$hour}:00:00";

    			$rows_info[$row] = array(
					'date' => $date,
					'day_type' => $day_type,
					'environment' => $current_environment
    			);

    			$row++;
    		}
    	}

    	return $rows_info;

    }

    private static function readMeterCSV()
    {
    	$data = array();
    	$meter_objects = self::readMdd();
    	$rows_info = self::readMtr($meter_objects);
    	$path_csv = public_path('output/eplusMeter.csv');

    	$reader = Reader::createFromPath($path_csv);
		$entries = $reader->fetchAssoc(0);

		foreach ($entries as $row => $values)
		{
			$row_info = $rows_info[$row];

			if (strpos($row_info['day_type'], 'DesignDay') !== false) {
				continue;
			}

			$date_time = trim($values["Date/Time"]);
			unset($values["Date/Time"]);

			foreach ($values as $meter_object => $value) {
				if(!array_key_exists($meter_object, $data)) {
					$data[$meter_object] = array();
				}

				if (strpos($meter_object, 'Electricity:Facility') !== false) {	// J/1000
					$value = $value/1000;
				}

				if (strpos($meter_object, 'Gas:Facility') !== false) {			// (J/1000)*3.412
					$value = ($value/1000)*3.412;
				}

				$data[$meter_object][$date_time] = $value; 
			}

		}

		return $data;
    }
}
