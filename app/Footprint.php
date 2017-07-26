<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footprint extends Model
{
	static function averageGuess($id){

		 return (int)Presenter::where('footprint_id', $id)->avg('guess');

	}
}
