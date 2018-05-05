<?php

namespace App;

use App\Trait\ReconciledStockOut;
use Illuminate\Database\Eloquent\Model;

class GoodsDeliveryNoteLine extends Model
{
	use ReconciledStockOut;

	protected $fillable = ['quantity_delivered', 'goods_delivery_note_id', 'description'];
    protected $table = 'goods_delivery_notes_lines';

    public function goodsDeliveryNote()
    {
    	return $this->belongsTo('App\GoodsDeliveryNote', 'goods_delivery_note_id');
    }
}
