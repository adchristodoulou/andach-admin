<?php

namespace App;

use App\Trait\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
	use BelongsToCompany;

    protected $fillable = ['name', 'company_id'];
    protected $table = 'financial_years';

    public function financialPeriods()
    {
    	return $this->hasMany('App\FinancialPeriod', 'financial_year_id');
    }

    public function trialBalances()
    {
    	return $this->hasMany('App\TrialBalance', 'App\FinancialPeriod', 'financial_year_id', 'financial_period_id');
    }
}
