<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use League\Csv\Reader;
use PhpUnstructuredTextParser\TextParser;

class Meter extends Model
{
    private static $mtr_path = "/output/eplus.mtr";
    
    public static function Loadcsv($data_path)
    {
    	$reader = Reader::createFromPath($data_path);
		$entries = $reader->fetchAll();
		return $entries;
    }


    public static function LoadMeter($data_path)
    {	
	    $data = array();
    	
    	$reader = self::Loadcsv($data_path);
    	$entries = [];
    	foreach ($reader as $key => $value) {
    		if($key > 6 && $key < 19){
    			array_push($entries, $value);	
    		}
    	}
		
	  
		$elec_meter = [];
		$gas_meter = [];
		$i = 1;

		foreach ($entries as $meter_value)
		{
			$elec_meter[$i] = round($meter_value[1]);
			$gas_meter[$i] = round($meter_value[2]);
			$i++;
		}

		$data = [
			'Electric'=>$elec_meter,
			'Gas'=>$gas_meter
		]; 

		return compact('data');

    }

    public static function LoadEplusData($data_path)
    {	
	    $data = array();
    
    	$reader = self::Loadcsv($data_path);
    
    	$key_pos_arr = [];
    	$date_arr = [];


    	foreach ($reader as $key_pos =>$date) {
    		if($date[0] == 4 && $date[1] >= 31){
    			array_push($key_pos_arr, $key_pos);
    			array_push($date_arr, $date[2]);	
    		}
    	}
		
		$elec_meter = [];
		$gas_meter = [];

		$i=0;
		
		while ($i < count($key_pos_arr)) {
			
			$j = $i + 1;  
		
			$k = $key_pos_arr[$i]+3;
			$l = $key_pos_arr[$i]+2;

			//converts joules to kBTU and saves to array
			$elec_meter[$j] = round(($reader[$k][1])/1055055);
			$gas_meter[$j] = round(($reader[$l][1])/1055055);
			
			$i++;
		}

		$data = [
			'Electric'=>$elec_meter,
			'Gas'=>$gas_meter
		]; 

		return compact('data');

    }
}
