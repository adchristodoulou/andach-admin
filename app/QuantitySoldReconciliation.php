<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantitySoldReconciliation extends Model
{
    
    protected $fillable = ['quantity_reconciled'];
    protected $table = 'quantity_sold_reconciliation';
    
    public function lines()
    {
        return $this->hasMany('App\QuantitySoldReconciliationLine', 'quantity_sold_reconciliation_id');
    }
}
