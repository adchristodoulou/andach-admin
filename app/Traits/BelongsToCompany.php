<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToCompany
{
	public function company()
    {
    	return $this->belongsTo('App\Company', 'company_id');
    }

    public function getCompanyNameAttribute()
    {
    	if ($this->company)
    	{
    		return $this->company->name;
    	}
    }
}