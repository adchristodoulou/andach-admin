<?php

namespace App;

use App\Traits\BelongsToProductVariation;
use App\Traits\ReconciledStockOut;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceLine extends Model
{
    use BelongsToProductVariation;
    use ReconciledStockOut;

    protected $fillable = ['sales_invoice_id', 'net', 'vat', 'gross', 'description'];
    protected $table = 'sales_invoices_lines';

    public function invoice()
    {
    	return $this->belongs('App\SalesInvoice', 'sales_invoice_id');
    }
}
