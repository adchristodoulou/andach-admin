<?php

namespace App;

use App\Events\PositionSaving;
use App\Traits\BelongsToCompany;
use App\Traits\BelongsToJob;
use App\Traits\BelongsToReportingUnit;
use App\Traits\BelongsToReportingUnitArea;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use BelongsToCompany;
    use BelongsToJob;
    use BelongsToReportingUnit;
    use BelongsToReportingUnitArea;

    protected $fillable = ['job_id', 'reporting_unit_id', 'area_id', 'company_id', 'from_date', 'to_date', 'weekly_hours_authorised', 'can_hire', 'can_manage_grievance', 'can_manage_disciplinary', 'can_manage_timesheets', 'can_manage_holiday'];

    protected $dispatchesEvents = [
        'saving' => PositionSaving::class,
    ];
}
