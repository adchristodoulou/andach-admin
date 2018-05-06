<?php

namespace App;

use App\Traits\BelongsToCostCode;
use App\Traits\BelongsToPerson;
use App\Traits\HasCurrentValue;
use App\Traits\IsLedgerComponent;
use Illuminate\Database\Eloquent\Model;

class StockHolding extends Model
{
    use BelongsToCostCode;
	use BelongsToPerson;
	use HasCurrentValue;
	use HasSingleFilename;
	use IsLedgerComponent;

    protected $fillable = ['ledger_id', 'cost_code_id', 'document_date', 'name', 'description', 'current_value', 'current_quantity'];
    protected $table = 'stock_holdings';

    public function gdnLines()
    {
    	return $this->hasMany('App\GoodsDeliveryNoteLine', 'stock_holding_id');
    }

    public function grnLines()
    {
    	return $this->hasMany('App\GoodsReceiptNoteLine', 'stock_holding_id');
    }
}
