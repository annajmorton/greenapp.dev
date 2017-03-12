<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
	public function visitor()
	{
	    return $this->belongsToMany('App\Visitor', 'survey_visitor');
	}
}
