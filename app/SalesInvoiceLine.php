<?php

namespace App;

use App\Events\InvoiceLineSaved;
use App\Traits\BelongsToProductVariation;
use App\Traits\IsInvoiceLine;
use App\Traits\ReconciledStockOut;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceLine extends Model
{
    use BelongsToProductVariation;
    use IsInvoiceLine;
    use ReconciledStockOut;

    protected $dispatchesEvents = [
        'saved' => InvoiceLineSaved::class,
    ];
    protected $fillable = ['sales_invoice_id', 'net', 'vat', 'gross', 'description'];
    protected $table = 'sales_invoices_lines';

    public function invoice()
    {
    	return $this->belongsTo('App\SalesInvoice', 'sales_invoice_id');
    }
    
    public function reconciliations()
    {
        return $this->morphMany('App\QuantitySoldReconciliationLine', 'reconcilable');
    }
}
