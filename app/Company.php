<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public function jobs()
    {
    	return $this->hasMany('App\Job', 'company_id');
    }

    public function jobGrades()
    {
    	return $this->hasMany('App\JobGrade', 'company_id');
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
