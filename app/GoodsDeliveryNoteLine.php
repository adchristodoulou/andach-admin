<?php

namespace App;

use App\Traits\BelongsToProductVariation;
use App\Traits\ReconciledStockOut;
use Illuminate\Database\Eloquent\Model;

class GoodsDeliveryNoteLine extends Model
{
    use BelongsToProductVariation;
	use ReconciledStockOut;

	protected $fillable = ['quantity_delivered', 'goods_delivery_note_id', 'description'];
    protected $table = 'goods_delivery_notes_lines';

    public function goodsDeliveryNote()
    {
    	return $this->belongsTo('App\GoodsDeliveryNote', 'goods_delivery_note_id');
    }
    
    public function reconciliations()
    {
        return $this->morphMany('App\QuantitySoldReconciliationLine', 'reconcilable');
    }
}
