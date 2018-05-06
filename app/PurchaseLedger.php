<?php

namespace App;

use App\Traits\BelongsToExpenseCode;
use App\Traits\HasCurrentValue;
use App\Traits\IsLedger;
use Illuminate\Database\Eloquent\Model;

class PurchaseLedger extends Model
{
    use BelongsToExpenseCode;
	use HasCurrentValue;
	use IsLedger;

	protected $fillable = ['expense_code_id', 'name'];
    protected $table = 'purchase_ledgers';

    public function transactions()
    {
    	return $this->hasMany('App\PurchaseInvoice', 'ledger_id');
    }
}
