<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantityPurchasedReconciliationLine extends Model
{
    protected $table = 'quantity_purchased_reconciliation_lines';
    
    public function reconcilable()
    {
        return $this->morphTo();
    }
    
    public function reconciliation()
    {
        return $this->belongsTo('App\QuantityPurchasedReconciliation', 'quantity_purchased_reconciliation_id');
    }
}
