<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public function survey()
	{
	    return $this->belongsToMany('App\Survey', 'survey_visitor');
	}
}
