<?php

namespace App;

use App\Traits\BelongsToProductVariation;
use App\Traits\ReconciledStockIn;
use Illuminate\Database\Eloquent\Model;

class GoodsReceiptNoteLine extends Model
{
    use BelongsToProductVariation;
    use ReconciledStockIn;

	protected $fillable = ['quantity_delivered', 'goods_receipt_note_id', 'description'];
    protected $table = 'goods_receipt_notes_lines';

    public function goodsReceiptNote()
    {
    	return $this->belongsTo('App\GoodsDeliveryNote', 'goods_receipt_note_id');
    }
}
