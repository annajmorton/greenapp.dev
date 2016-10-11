<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use League\Csv\Reader;

class Eplus extends Model
{
    public static function runIdf()
    {    	
	   $filename = "5ZoneAirCooled";
	   $weather = __DIR__ ."/../storage/weather/USA_IL_Chicago-OHare.Intl.AP.725300_TMY3.epw";
	   $idd = "/usr/local/EnergyPlus-8-5-0/Energy+.idd";
	   $command = "energyplus -i ".$idd." -p ".$filename." -w ".$weather." -d output idf/".$filename.".idf";
	   
	   $process = new Process($command);

		try {
		    $process->mustRun();

		    $result = $process->getOutput();
		} catch (ProcessFailedException $e) {
		    $result = $e->getMessage();
		}

		return $command;
    }

    public static function generateFiles($idf_path, $weather_path)
    {
		$idd = "/usr/local/EnergyPlus-8-5-0/Energy+.idd";
		$success = true;
		$data = array();
		$data = self::readMeterCSV();
		return compact('success', 'data');

		$command = "energyplus -i ".$idd." -r -s C -w ".$weather_path." -d output ".$idf_path;

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
			$data = $this->readMeterCSV();
		}

		return compact('success', 'data');
    }

    private static function readMeterCSV()
    {
    	$path = public_path('output/eplusMeter.csv');

    	$reader = Reader::createFromPath($path);
		$entries = $reader->fetchAssoc(0);

		foreach ($entries as $value)
		{
			dd($value);
		}
    }
}
