<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantitySoldReconciliationLine extends Model
{
    protected $table = 'quantity_sold_reconciliation_lines';
    
    public function reconcilable()
    {
        return $this->morphTo();
    }
    
    public function reconciliation()
    {
        return $this->belongsTo('App\QuantitySoldReconciliation', 'quantity_sold_reconciliation_id');
    }
}
