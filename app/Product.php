<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name'];
    protected $table = 'products';

    public function attributes()
    {
    	return $this->belongsToMany('App\ProductAttribute', 'link_products_products_attributes', 'product_id', 'product_attribute_id');
    }

    public function canEditAttributes()
    {
        return $this->variations()->count() == 0;
    }

    public function setAllowedAttributes($array)
    {
        $this->attributes()->sync($array);
    }

    public function variations()
    {
    	return $this->hasMany('App\ProductVariation', 'product_id');
    }
}
