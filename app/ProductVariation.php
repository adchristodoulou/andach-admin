<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $fillable = ['name', 'product_id', 'supplier_code', 'sale_price', 'purchase_price'];
    protected $table = 'products_variations';

    public function addAttributeValue($valueID)
    {
        $this->productAttributesValues()->attach($valueID);
    }

    public function getEditAttributeRowAttribute()
    {
        if ($this->productAttributesValues()->count())
        {
            $width = 12 / $this->productAttributesValues()->count();
            $return = '<div class="row">';

            foreach ($this->productAttributesValues()->get() as $value)
            {
                $return .= '<div class="col-'.$width.'">'.$value->name.'</div>';
            }

            $return .= '</div>';
        } else {
            $return = '<div class="row"><div class="col-12">-- no attributes --</div></div>';
        }

        return $return;
    }

    public function productAttributesValues()
    {
    	return $this->belongsToMany('App\ProductAttributeValue', 'link_products_variations_attribute_values', 'product_variation_id', 'product_attribute_value_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function setAttributesAndValues()
    {

    }
}
