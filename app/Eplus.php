<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
}
