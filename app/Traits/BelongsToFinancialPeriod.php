<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToFinancialPeriod
{
	public function financialPeriod()
    {
    	return $this->belongsTo('App\FinancialPeriod', 'financial_period_id');
    }
}