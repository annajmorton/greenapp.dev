<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Visitor;
use App\Survey;

class VisitorController extends Controller
{
    
    public function showhome()
    {
        $surveys = Survey::all();
        return view('home',compact('surveys'));
    }


    public function store(Request $request)
    {
        if($request->has('email')){
            $visitor = new Visitor();
            $email = $request->input('email');

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                session()->flash('emailissue', 'not an email');
                return back();
            }
            
            $visitor->email = $email;
            $visitor->save();
            
            if ($request->has('options')) {
                $surveys = $request->input('options');
                foreach ($surveys as $survey) {
                    $visitor->survey()->attach($survey);
                }
            }
            $visitor->save();
        }
        return view('welcome');
    }

}
