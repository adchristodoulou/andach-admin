<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToJob
{
	public function getJobNameAttribute()
	{
		if (!$this->job)
		{
			return 'ERROR: JOB NOT FOUND';
		}

		return $this->job->name;
	}

	public function job()
    {
    	return $this->belongsTo('App\Job', 'job_id');
    }
}