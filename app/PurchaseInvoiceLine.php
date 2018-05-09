<?php

namespace App;

use App\Traits\BelongsToProductVariation;
use App\Traits\ReconciledStockIn;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceLine extends Model
{
    use BelongsToProductVariation;
	use ReconciledStockIn;

    protected $fillable = ['purchase_invoice_id', 'net', 'vat', 'gross', 'description'];
    protected $table = 'purchase_invoices_lines';

    public function invoice()
    {
    	return $this->belongs('App\PurchaseInvoice', 'purchase_invoice_id');
    } 
    
    public function reconciliations()
    {
        return $this->morphMany('App\QuantityPurchasedReconciliationLine', 'reconcilable');
    }
}
