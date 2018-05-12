<?php

namespace App\Traits;

use Form;
use Illuminate\Http\Request;

trait IsInvoiceLine
{
    function getEditBoxAttribute()
    {
        return '<div class="col-1">'.Form::checkbox('delete[]', $this->id, null, ['class' => 'form-control']).'</div>
            <div class="col-2">'.$this->description.'</div>
            <div class="col-3">'.$this->product_name.'</div>
            <div class="col-2">'.$this->net.'</div>
            <div class="col-2">'.$this->vat.'</div>
            <div class="col-2">'.$this->gross.'</div>';
    }
    
    function getShowBoxAttribute()
    {
        return '<div class="col-3">'.$this->description.'</div>
            <div class="col-3">'.$this->product_name.'</div>
            <div class="col-2">'.$this->net.'</div>
            <div class="col-2">'.$this->vat.'</div>
            <div class="col-2">'.$this->gross.'</div>';
    }
}