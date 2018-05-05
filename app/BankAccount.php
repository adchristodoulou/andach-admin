<?php

namespace App;

use App\Traits\BelongsToExpenseCode;
use App\Traits\HasCurrentValue;
use App\Traits\IsLedger;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
	use BelongsToExpenseCode;
	use HasCurrentValue;
	use IsLedger;

	protected $fillable = ['expense_code_id', 'name'];
    protected $table = 'bank_accounts';

    public function transactions()
    {
    	return $this->hasMany('App\BankTransaction', 'ledger_id');
    }
}
