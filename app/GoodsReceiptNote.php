<?php

namespace App;

use App\Traits\BelongsToPerson;
use Illuminate\Database\Eloquent\Model;

class GoodsReceiptNote extends Model
{
    use BelongsToPerson;

	protected $fillable = ['person_id', 'stock_holding_id', 'document_date', 'name', 'description'];
    protected $table = 'goods_receipt_notes';

    public function lines()
    {
    	return $this->hasMany('App\GoodsReceiptNoteLine', 'goods_receipt_note_id');
    }
}
