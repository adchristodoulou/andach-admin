<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $fillable = ['name', 'product_attribute_id'];
    protected $table = 'products_attributes_values';

    public function productAttribute()
    {
    	return $this->belongsTo('App\ProductAttribute', 'product_attribute_id');
    }

    public function productVariations()
    {
    	return $this->belongsToMany('App\ProductVariations', 'link_products_variations_attribute_values', 'product_variation_id', 'product_attribute_value_id');
    }
}
