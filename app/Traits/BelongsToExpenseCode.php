<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToExpenseCode
{
	public function expenseCode()
    {
    	return $this->belongsTo('App\ExpenseCode', 'expense_code_id');
    }

    public function getExpenseCodeNameAttribute()
    {
    	if ($this->expenseCode)
    	{
    		return $this->expenseCode->name;
    	}
    }
}