<?php

namespace App;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use BelongsToCompany;
	
	protected $fillable = ['name', 'category_id', 'company_id', 'grade_id', 'job_description_summary', 'job_description_full', 'requires_dbs_check_standard', 'requires_dbs_check_child_barred', 'requires_dbs_check_adult_barred', 'requires_dbs_check_extended', 'is_salaried', 'requires_criminal_information', 'requires_spent_criminal_information', 'minimum_number_references_needed', 'number_of_years_references_must_cover'];
    protected $table = 'jobs';

    public function authorisedSalaries()
    {
    	return $this->hasMany('App\JobAuthorisedSalary', 'job_id');
    }

    public function contracts()
    {
    	return $this->belongsToMany('App\Contract', 'link_jobs_allowed_contracts', 'job_id', 'contract_id');
    }

    public function setAllowedContracts($contracts)
    {
    	$this->contracts()->sync($contracts);
    }

    public function setAuthorisedSalaries($salariesFrom, $salariesTo)
    {
    	//TODO: this
    }
}
