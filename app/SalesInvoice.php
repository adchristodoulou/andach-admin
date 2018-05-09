<?php

namespace App;

use App\Traits\BelongsToCostCode;
use App\Traits\BelongsToPerson;
use App\Traits\HasCurrentValue;
use App\Traits\HasSingleFilename;
use App\Traits\IsLedgerComponent;
use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    use BelongsToCostCode;
	use BelongsToPerson;
	use HasCurrentValue;
	use HasSingleFilename;
	use IsLedgerComponent;

    protected $fillable = ['ledger_id', 'cost_code_id', 'document_date', 'name', 'description', 'current_value', 'current_quantity', 'person_id', 'filename', 'net', 'vat', 'gross'];
    protected $table = 'sales_invoices';

    public function lines()
    {
    	return $this->hasMany('App\SalesInvoiceLine', 'sales_invoice_id');
    }
}
