<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BelongsToProductVariation
{
	public function productVariation()
    {
    	return $this->belongsTo('App\ProductVariation', 'product_variation_id');
    }

    public function getProductVariationNameAttribute()
    {
    	if ($this->productVariation)
    	{
    		return $this->productVariation->name;
    	}
    }
}