<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = ['name'];
    protected $table = 'products_attributes';

    public function products()
    {
    	return $this->belongsToMany('App\Product', 'link_products_products_attributes', 'product_attribute_id', 'product_id');
    }

    public function values()
    {
    	return $this->hasMany('App\ProductAttributeValue', 'product_attribute_id');
    }
}
