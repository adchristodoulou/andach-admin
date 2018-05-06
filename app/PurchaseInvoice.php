<?php

namespace App;

use App\Traits\BelongsToCostCode;
use App\Traits\BelongsToPerson;
use App\Traits\HasCurrentValue;
use App\Traits\HasSingleFilename;
use App\Traits\IsLedgerComponent;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
	use BelongsToCostCode;
	use BelongsToPerson;
	use HasCurrentValue;
	use HasSingleFilename;
	use IsLedgerComponent;

    protected $fillable = ['ledger_id', 'cost_code_id', 'document_date', 'name', 'description', 'current_value', 'current_quantity', 'person_id', 'filename', 'total_net', 'total_vat', 'total_gross'];
    protected $table = 'purchase_invoices';

    public function lines()
    {
    	return $this->hasMany('App\PurchaseInvoiceLine', 'purchase_invoice_id');
    }
}
