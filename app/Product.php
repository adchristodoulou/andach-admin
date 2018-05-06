<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name'];
    protected $table = 'products';

    public function attributes()
    {
    	return $this->belongsToMany('App\ProductAttribute', 'link_products_products_attributes', 'product_attribute_id', 'product_id');
    }

    public function variations()
    {
    	return $this->hasMany('App\ProductVariation', 'product_id');
    }
}
