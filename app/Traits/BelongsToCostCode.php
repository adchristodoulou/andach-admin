<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToCostCode
{
	public function costCode()
    {
    	return $this->belongsTo('App\ExpenseCode', 'expense_code_id');
    }

    public function getcostCodeNameAttribute()
    {
    	if ($this->costCode)
    	{
    		return $this->costCode->name;
    	}
    }
}