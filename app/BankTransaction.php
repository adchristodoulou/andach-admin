<?php

namespace App;

use App\Traits\BelongsToCostCode;
use App\Traits\IsLedgerComponent;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
	use BelongsToCostCode;
	use IsLedgerComponent;

    protected $table = 'bank_transactions';

    public function bankAccount()
    {
    	return $this->belongsTo('App\BankAccount', 'ledger_id');
    }
}
