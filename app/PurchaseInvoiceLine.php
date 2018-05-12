<?php

namespace App;

use App\Events\InvoiceLineDeleted;
use App\Events\InvoiceLineSaved;
use App\Traits\BelongsToProductVariation;
use App\Traits\IsInvoiceLine;
use App\Traits\ReconciledStockIn;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceLine extends Model
{
    use BelongsToProductVariation;
    use IsInvoiceLine;
	use ReconciledStockIn;
    
    protected $dispatchesEvents = [
        'deleted' => InvoiceLineDeleted::class,
        'saved' => InvoiceLineSaved::class,
    ];
    protected $fillable = ['purchase_invoice_id', 'net', 'vat', 'gross', 'description'];
    protected $table = 'purchase_invoices_lines';

    public function invoice()
    {
    	return $this->belongsTo('App\PurchaseInvoice', 'purchase_invoice_id');
    } 
    
    public function reconciliations()
    {
        return $this->morphMany('App\QuantityPurchasedReconciliationLine', 'reconcilable');
    }
}
