<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToReportingUnit
{
	public function reportingUnit()
    {
    	return $this->belongsTo('App\ReportingUnit', 'reporting_unit_id');
    }

    public function getReportingUnitNameAttribute()
    {
    	if ($this->reportingUnit)
    	{
    		return $this->reportingUnit->name;
    	}
    }
}