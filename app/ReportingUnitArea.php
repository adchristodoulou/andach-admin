<?php

namespace App;

use App\Traits\BelongsToCompany;
use App\Traits\BelongsToReportingUnit;
use Illuminate\Database\Eloquent\Model;

class ReportingUnitArea extends Model
{
    use BelongsToCompany;
    use BelongsToReportingUnit;

    protected $table = 'reporting_units_areas';

    public function position()
    {
    	return $this->hasMany('App\Position', 'area_id');
    }
}
