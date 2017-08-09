<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Footprint;
use App\Presenter;

class Ibpsa17Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        
        $anna = Footprint::find(1);
        $anna->guess = Footprint::averageGuess(1);
        $anna->save();

        $ajit = Footprint::find(2);
        $ajit->guess = Footprint::averageGuess(2);
        $ajit->save();

        $scott = Footprint::find(3);
        $scott->guess = Footprint::averageGuess(3);
        $scott->save();

        $footprints = Footprint::all();
        
        $data['searchQuery'] = '';
        $data['gridColumns'] = ['first_name', 'last_name','guess','calculated'];
        $data['gridData'] = $footprints->toArray();     

        return response()->json($data, 200);
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
        $footprint = new Footprint;

        $footprint->first_name = $request->first_name;
        $footprint->last_name = $request->last_name;
        $footprint->email = $request->email;
        $footprint->guess = $request->guess;
        $footprint->calculated = $request->calculated;
        $footprint->save();
        
        return redirect('score');
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
        
        // the app is not using this method... 

        $anna = Footprint::find(1);
        $ajit = Footprint::find(2);
        $scott = Footprint::find(3);
        $data = collect($anna,$ajit,$scott);
        $data = [
            'anna'=>$anna,
            'ajit'=>$ajit,
            'scott'=>$scott
        ];

        return response()->json($data, 200);
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
       $this->validate($request, [
            'anna' => 'required|numeric',
            'ajit' => 'required|numeric',
            'scott' => 'required|numeric',
        ]);


        $anna = new Presenter();
        $ajit = new Presenter();
        $scott = new Presenter();

        $anna->footprint_id=1;
        $anna->guess = (int)$request->input('anna');

        $ajit->footprint_id=2;
        $ajit->guess = (int)$request->input('ajit');

        $scott->footprint_id=3;
        $scott->guess = (int)$request->input('scott');

        $anna->save();
        $ajit->save();
        $scott->save();


        return response()->json($request->all(), 200);
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
}
