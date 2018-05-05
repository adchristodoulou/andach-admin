<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialPeriod extends Model
{
    protected $fillable = ['name', 'order', 'financial_year_id'];
	protected $table = 'financial_periods';
	
    public function financialYear()
    {
    	return $this->belongsTo('App\FinancialYear', 'financial_year_id');
    }

    public function trialBalances()
    {
    	return $this->hasMany('App\TrialBalance', 'financial_period_id');
    }
}
