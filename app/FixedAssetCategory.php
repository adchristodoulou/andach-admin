<?php

namespace App;

use App\Traits\BelongsToExpenseCode;
use App\Traits\HasCurrentValue;
use App\Traits\IsLedger;
use Illuminate\Database\Eloquent\Model;

class FixedAssetCategory extends Model
{
    use BelongsToExpenseCode;
	use HasCurrentValue;
	use IsLedger;

    protected $table = 'fixed_asset_categories';

    public function fixedAssets()
    {
    	return $this->hasMany('App\FixedAsset', 'ledger_id');
    }
}
