<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractSickPay extends Model
{
	protected $fillable = ['from_month', 'to_month', 'weeks_sick_pay', 'contract_id'];
    protected $table = 'contracts_sick_pay';
}
