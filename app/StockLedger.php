<?php

namespace App;

use App\Traits\BelongsToExpenseCode;
use App\Traits\HasCurrentValue;
use App\Traits\IsLedger;
use Illuminate\Database\Eloquent\Model;

class StockLedger extends Model
{
    use BelongsToExpenseCode;
	use HasCurrentValue;
	use IsLedger;

	protected $fillable = ['expense_code_id', 'name'];
    protected $table = 'stock_ledgers';

    public function transactions()
    {
    	return $this->hasMany('App\StockHolding', 'ledger_id');
    }
}
