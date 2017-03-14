<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Eplus;
use App\Meter; 

class EplusController extends Controller
{
    
    public function runDefault()
    {

        $idf_path = storage_path('default') . "/monthmeter.idf";
        $weather_path = storage_path('default') . "/USA_TX_San.Antonio.Intl.AP.722530_TMY3.epw";
        $data_path = storage_path('default') ."/data_Office_default.csv";
        
        //run EnergyPlus File Here
        $result = Eplus::generateFiles($idf_path, $weather_path);

        if (!$result['success']) {
            session()->flash('eperror', 'Your file did not run successfully');
            return back();
        }

        $mtr_file = base_path('output') . "/eplus.mtr";
        $result = Meter::LoadEplusData($mtr_file);

        //Load Utility Meter data here
        $result2 = Meter::LoadMeter($data_path);

        $eplus_out = $result['data'];
        $umeter_out = $result2['data'];
        return view('charts', compact('eplus_out','umeter_out'));
    }

    public function uploadFiles()
    {

        if (!$this->validateUploadFiles()) {
            session()->flash('upload', 'Upload required information');
            return back();
        }

        $idf_path = $this->moveIdfFile();
        $weather_path = $this->moveWeatherFile();
        $data_path = $this->moveDataFile();
        
        //run EnergyPlus File Here
        $result = Eplus::generateFiles($idf_path, $weather_path);

        if (!$result['success']) {
            session()->flash('eperror', 'Your file did not run successfully');
            return back();
        }

        $mtr_file = base_path('output') . "/eplus.mtr";
        $result = Meter::LoadEplusData($mtr_file);

        //Load Utility Meter data here
        $result2 = Meter::LoadMeter($data_path);

        $eplus_out = $result['data'];
        $umeter_out = $result2['data'];
        return view('charts', compact('eplus_out','umeter_out'));
    }

    private function validateUploadFiles()
    {
        if ($_FILES["idf"]["error"] != UPLOAD_ERR_OK || 
            $_FILES["weather"]["error"] != UPLOAD_ERR_OK ||
            $_FILES["data"]["error"] != UPLOAD_ERR_OK) {
            return false;
        }

        return true;
    }

    private function moveIdfFile()
    {
        $uploads_dir = storage_path('uploads');
        $tmp_name = $_FILES["idf"]["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["idf"]["name"]);
        $path = "{$uploads_dir}/idfs/{$name}";
        move_uploaded_file($tmp_name, $path);

        return $path;
    }

    private function moveWeatherFile()
    {
        $uploads_dir = storage_path('uploads');
        $tmp_name = $_FILES["weather"]["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["weather"]["name"]);
        $path = "{$uploads_dir}/weathers/{$name}";
        move_uploaded_file($tmp_name, $path);

        return $path;
    }

    private function moveDataFile()
    {
        $uploads_dir = storage_path('uploads');
        $tmp_name = $_FILES["data"]["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["data"]["name"]);
        $path = "{$uploads_dir}/data/{$name}";
        move_uploaded_file($tmp_name, $path);

        return $path;
    }
}
