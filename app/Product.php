<?php

namespace App;

use App\ProductAttributeValue;
use App\ProductVariation;
use Form;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name'];
    protected $table = 'products';

    public function addVariation($array)
    {
        if ($this->hasVariationWithValues($array['attribute']))
        {
            return false;
        }

        $variation = new ProductVariation($array);
        $this->variations()->save($variation);

        foreach ($array['attribute'] as $attributeID => $valueID)
        {
            $variation->addAttributeValue($valueID);
        }

        return true;
    }

    public function attributes()
    {
    	return $this->belongsToMany('App\ProductAttribute', 'link_products_products_attributes', 'product_id', 'product_attribute_id');
    }

    public function canEditAttributes()
    {
        return $this->variations()->count() == 0;
    }

    public function getAddVariationFieldsAttribute()
    {
        $return = '';

        if ($this->attributes()->count())
        {

            foreach ($this->attributes()->get() as $attribute)
            {
                $return .= '<div class="col-2">'.Form::label('attribute['.$attribute->id.']', $attribute->name).'</div>
                    <div class="col-10">'.
                    Form::select('attribute['.$attribute->id.']', $attribute->formArray(), null, ['class' => 'form-control'])
                    .'</div>';
            }
        }

        return $return;
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
            $return = '<div class="row"><div class="col-4">-- no attributes --</div></div>';
        }

        return $return;
    }

    public function hasVariationWithValues($valuesArray)
    {
        foreach ($this->variations as $variation)
        {
            $theseAttributes = $variation->productAttributesValues->pluck('id')->toArray();

            if (!array_diff($valuesArray, $theseAttributes) && !array_diff($theseAttributes, $valuesArray))
            {
                return true;
            }
        }

        return false;
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
