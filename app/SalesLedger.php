<?php

namespace App;

use App\Traits\BelongsToExpenseCode;
use App\Traits\HasCurrentValue;
use App\Traits\IsLedger;
use Illuminate\Database\Eloquent\Model;

class SalesLedger extends Model
{
    use BelongsToExpenseCode;
	use HasCurrentValue;
	use IsLedger;

	protected $fillable = ['expense_code_id', 'name'];
    protected $table = 'sales_ledgers';

    public function transactions()
    {
    	return $this->hasMany('App\SalesInvoice', 'ledger_id');
    }
}
