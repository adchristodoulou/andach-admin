<?php

namespace App;

use App\Traits\Documented;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use Documented;

    protected $table = 'people';

    public function getNameAttribute()
    {
    	if ($this->preferred_name)
    	{
    		return $this->preferred_name;
    	} else {
    		return $this->first_name.' '.$this->last_name;
    	}
    }

    public function users()
    {
        return $this->hasMany('App\User', 'person_id');
    }
}
