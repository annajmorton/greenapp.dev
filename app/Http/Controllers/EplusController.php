<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Eplus;

class EplusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        $result = Eplus::generateFiles($idf_path, $weather_path);

        if (!$result['success']) {
            session()->flash('eperror', 'Your file did not run successfully');
            return back();
        }

        $eplus_out = $result['data'];

        $meter_data = [];

        // code to get utility meter data here ....  use the Meter Model

        return view('charts', compact('eplus_out', 'meter_data'));
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
