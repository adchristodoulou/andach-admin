<?php

namespace App;

use App\ContractSickPay;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['name', 'annual_hours_holiday', 'bank_holidays_off', 'fte_hours_per_week', 'notice_period_days', 'overtime_multiplier', 'pension_match_delay_months', 'pension_match_up_to_percent', 'pension_multiplier', 'will_work_nights'];

    public function jobs()
    {
        return $this->belongsToMany('App\Job', 'link_jobs_allowed_contracts', 'contract_id', 'job_id');
    }

    public function sickPayPeriods()
    {
    	return $this->hasMany('App\ContractSickPay', 'contract_id');
    }

    public function updateSickPay($from_months_array, $weeks_sick_pay_array)
    {
        $array = array();

    	foreach ($from_months_array as $key => $months)
    	{
    		if (is_numeric($months))
    		{
    			$array[$months] = $weeks_sick_pay_array[$key];
    		}
    	}

    	ContractSickPay::where('contract_id', $this->id)->delete();

        if (count($array) == 0) return;
        
    	foreach ($array as $months => $weeks)
    	{
    		$sickpay = ContractSickPay::create(['contract_id' => $this->id, 'from_month' => $months, 'weeks_sick_pay' => $weeks]);
    		$sickpay->save();
    	}
    }
}
