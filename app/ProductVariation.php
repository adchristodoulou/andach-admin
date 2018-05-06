<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $fillable = ['name', 'product_id'];
    protected $table = 'products_attribtues';

    public function productAttributesValues()
    {
    	return $this->belongsToMany('App\ProductAttributeValues', 'link_products_variations_attribute_values', 'product_attribute_value_id', 'product_variation_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
