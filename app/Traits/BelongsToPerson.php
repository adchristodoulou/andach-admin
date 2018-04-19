<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToPerson
{
	public function person()
    {
    	return $this->belongsTo('App\Person', 'person_id');
    }

    public function getPersonNameAttribute()
    {
    	if ($this->person)
    	{
    		return $this->person->name;
    	}
    }
}