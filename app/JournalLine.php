<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalLine extends Model
{
    protected $fillable = ['journal_id', 'cost_code_id', 'expense_code_id', 'debit_credit', 'quantity_movement'];

    public function componentable()
    {
    	return $this->morphTo();
    }

    public function ledgerable()
    {
    	return $this->morphTo();
    }
}
