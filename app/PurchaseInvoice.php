<?php

namespace App;

use App\Traits\BelongsToCostCode;
use App\Traits\BelongsToPerson;
use App\Traits\HasCurrentValue;
use App\Traits\HasSingleFilename;
use App\Traits\IsInvoice;
use App\Traits\IsLedgerComponent;
use Form;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use BelongsToCostCode;
    use BelongsToPerson;
    use HasCurrentValue;
    use HasSingleFilename;
    use IsInvoice;
    use IsLedgerComponent;

    protected $fillable = ['ledger_id', 'cost_code_id', 'document_date', 'name', 'description', 'current_value', 'current_quantity', 'person_id', 'filename', 'net', 'vat', 'gross'];
    protected $routePrefix = 'purchaseinvoice';
    protected $table = 'purchase_invoices';
    
    public function ledger()
    {
        return $this->belongsTo('App\PurchaseLedger', 'ledger_id');
    }

    public function lines()
    {
    	return $this->hasMany('App\PurchaseInvoiceLine', 'purchase_invoice_id');
    }
}
