<?php

namespace App;

use App\ContractSickPay;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['name', 'annual_hours_holiday', 'bank_holidays_off', 'fte_hours_per_week', 'is_zero_hours', 'notice_period_days', 'overtime_multiplier', 'pension_match_delay_months', 'pension_match_up_to_percent', 'pension_multipler', 'will_work_nights'];

    public function sickPayPeriods()
    {
    	return $this->hasMany('App\ContractSickPay', 'contract_id');
    }

    public function updateSickPay($from_months_array, $weeks_sick_pay_array)
    {
    	foreach ($from_months_array as $key => $months)
    	{
    		if (is_numeric($months))
    		{
    			$array[$months] = $weeks_sick_pay_array[$key];
    		}
    	}

    	ContractSickPay::where('contract_id', $this->id)->delete();

    	foreach ($array as $months => $weeks)
    	{
    		$sickpay = ContractSickPay::create(['contract_id' => $this->id, 'from_month' => $months, 'weeks_sick_pay' => $weeks]);
    		$sickpay->save();
    	}
    }
}
