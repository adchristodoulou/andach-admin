<?php

namespace App;

use App\Traits\BelongsToPerson;
use Illuminate\Database\Eloquent\Model;

class GoodsDeliveryNote extends Model
{
	use BelongsToPerson;

	protected $fillable = ['person_id', 'stock_holding_id', 'document_date', 'name', 'description'];
    protected $table = 'goods_delivery_notes';

    public function lines()
    {
    	return $this->hasMany('App\GoodsDeliveryNoteLine', 'goods_delivery_note_id');
    }
}
