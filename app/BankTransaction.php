<?php

namespace App;

use App\Traits\BelongsToCostCode;
use App\Traits\HasCurrentValue;
use App\Traits\IsLedgerComponent;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
	use BelongsToCostCode;
	use IsLedgerComponent;
	use HasCurrentValue;

	protected $fillable = ['ledger_id', 'cost_code_id', 'document_date', 'name', 'description', 'current_value', 'current_quantity'];
    protected $table = 'bank_transactions';

    public function bankAccount()
    {
    	return $this->belongsTo('App\BankAccount', 'ledger_id');
    }
}
