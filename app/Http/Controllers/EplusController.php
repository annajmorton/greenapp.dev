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
        $uploads_dir = storage_path('uploads');

        if ($_FILES["idf"]["error"] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["idf"]["tmp_name"];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["idf"]["name"]);
            $idf_path = "{$uploads_dir}/idfs/{$name}";
            move_uploaded_file($tmp_name, $idf_path);
        }

        if ($_FILES["weather"]["error"] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["weather"]["tmp_name"];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["weather"]["name"]);
            $weather_path = "{$uploads_dir}/weathers/{$name}";
            move_uploaded_file($tmp_name, $weather_path);
        }


        $result = Eplus::generateFiles($idf_path, $weather_path);

        if ($result['success'])
        {
            $data = $result['data'];

            return view('charts', compact('data'));
        }
    }
}
