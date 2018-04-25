<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToReportingUnitArea
{
    public function reportingUnitArea()
    {
        return $this->belongsTo('App\ReportingUnitArea', 'area_id');
    }

    public function getReportingUnitAreaNameAttribute()
    {
        if ($this->reportingUnitArea)
        {
            return $this->reportingUnitArea->name;
        }
    }
}