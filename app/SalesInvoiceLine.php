<?php

namespace App;

use App\Traits\ReconciledStockOut;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceLine extends Model
{
    use ReconciledStockOut;

    protected $fillable = ['sales_invoice_id', 'total_net', 'total_vat', 'total_gross'];
    protected $table = 'sales_invoices_lines';

    public function invoice()
    {
    	return $this->belongs('App\SalesInvoice', 'sales_invoice_id');
    }
}
