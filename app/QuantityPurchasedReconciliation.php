<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantityPurchasedReconciliation extends Model
{
    protected $fillable = ['quantity_reconciled'];
    protected $table = 'quantity_purchased_reconciliation';
    
    public function lines()
    {
        return $this->hasMany('App\QuantityPurchasedReconciliationLine', 'quantity_purchased_reconciliation_id');
    }
}
