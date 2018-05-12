<?php

namespace App;

use App\Traits\BelongsToCostCode;
use App\Traits\IsLedgerComponent;
use Illuminate\Database\Eloquent\Model;

class FixedAsset extends Model
{
    use BelongsToCostCode;
	use IsLedgerComponent;

    protected $table = 'fixed_assets';
    
    public function ledger()
    {
        return $this->belongsTo('App\FixedAssetCategory', 'ledger_id');
    }
}
