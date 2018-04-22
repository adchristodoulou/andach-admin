<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToJob
{
	public function jobs()
    {
    	return $this->belongsTo('App\Job', 'job_id');
    }
}