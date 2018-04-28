<?php

namespace App;

use App\Events\PositionCreating;
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
        'creating' => PositionCreating::class,
    ];

    //Returns the date one day before the from_date
    public function getDayBeforeStartAttribute()
    {
    	return date('Y-m-d', strtotime($this->from_date.' -1 day'));
    }

    public function scopeCurrent($query)
    {
    	return $this->scopeAtDate($query, now());
    }

    public function scopeAtDate($query, $date)
    {
        $date = date('Y-m-d', strtotime($date));

        return $query->where('from_date', '<=', $date)
            ->where(function ($query) use ($date) {
                $query->where('to_date', '>=', $date)
                    ->orWhereNull('to_date');
            });
    }

    //Updates the to_date of this position according to the from_date of a new position designed to take over from it. 
    public function updateToDate($newPosition)
    {
    	if ($newPosition->from_date < $this->from_date)
    	{
    		return false;
    	}

    	$this->to_date = $newPosition->day_before_start;
    	$this->save();

    	return true;
    }
}
