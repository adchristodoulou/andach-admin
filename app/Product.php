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

    public function getEditAttributeHeaderAttribute()
    {
        if ($this->attributes()->count())
        {
            $width = 12 / $this->attributes()->count();
            $return = '<div class="row">';

            foreach ($this->attributes()->get() as $attribute)
            {
                $return .= '<div class="col-'.$width.'">'.$attribute->name.'</div>';
            }

            $return .= '</div>';
        } else {
            $return = '<div class="col-4">-- no attributes --</div>';
        }

        return $return;
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
