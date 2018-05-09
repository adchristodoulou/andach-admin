<?php

namespace App;

use App\Job;
use App\JobGrade;
use App\ReportingUnit;
use App\ReportingUnitArea;
use Form;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //TODO: actually make this respect the passed job
    public function formAuthSalaries($job = null)
    {
        $areas = ReportingUnitArea::where('company_id', $this->id)->get();

        $return = '<div class="row">';
        foreach ($areas as $area)
        {
            $return .= '<div class="col-2">'.$area->name.'</div>';
            $return .= '<div class="col-2">From:</div>';
            $return .= '<div class="col-3">'.Form::text('authSalariesFrom['.$area->id.']', null, ['class' => 'form-control']).'</div>';
            $return .= '<div class="col-2">To:</div>';
            $return .= '<div class="col-3">'.Form::text('authSalariesTo['.$area->id.']', null, ['class' => 'form-control']).'</div>';
        }
        $return .= '</div>';

        return $return;
    }
    
    public function formCostCodes($default = null)
    {
        return Form::select('cost_code_id', CostCode::where('company_id', $this->id)->pluck('name', 'id'), $default, ['class' => 'form-control']);
    }

    public function formGradeSelect($default = null)
    {
        return Form::select('grade_id', JobGrade::where('company_id', $this->id)->pluck('name', 'id'), $default, ['class' => 'form-control']);
    }

    public function formJobSelect($default = null)
    {
        return Form::select('job_id', Job::where('company_id', $this->id)->pluck('name', 'id'), $default, ['class' => 'form-control']);
    }

    public function formReportingUnitSelect($default = null)
    {
        return Form::select('reporting_unit_id', ReportingUnit::where('company_id', $this->id)->pluck('name', 'id'), $default, ['class' => 'form-control']);
    }

    public function formReportingUnitAreaSelect($default = null)
    {
        return Form::select('area_id', ReportingUnit::where('company_id', $this->id)->pluck('name', 'id'), $default, ['class' => 'form-control']);
    }

	public function jobs()
    {
    	return $this->hasMany('App\Job', 'company_id');
    }

    public function jobGrades()
    {
    	return $this->hasMany('App\JobGrade', 'company_id');
    }

    public function journals()
    {
        return $this->hasMany('App\Journal', 'company_id');
    }

    public function positions()
    {
    	return $this->hasMany('App\Position', 'company_id');
    }

    public function reportingUnits()
    {
    	return $this->hasMany('App\ReportingUnit', 'company_id');
    }

    public function reportingUnitsAreas()
    {
    	return $this->hasMany('App\ReportingUnitArea', 'company_id');
    }
}
