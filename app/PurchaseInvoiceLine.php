<?php

namespace App;

use App\Traits\ReconciledStockIn;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceLine extends Model
{
	use ReconciledStockIn;

    protected $fillable = ['purchase_invoice_id', 'total_net', 'total_vat', 'total_gross'];
    protected $table = 'purchase_invoices_lines';

    public function invoice()
    {
    	return $this->belongs('App\PurchaseInvoice', 'purchase_invoice_id');
    } 
}
