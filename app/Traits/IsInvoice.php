<?php

namespace App\Traits;

use Form;
use Illuminate\Http\Request;

trait IsInvoice
{
    public function addLine($array)
    {
        $this->lines()->create($array);
    }
    
    public function canEdit()
    {
        return $this->finalised_date === null;
    }
    
    public function finalise()
    {
        $this->recalculate();
        $this->unreconciled_gross = $this->lines()->sum('gross');
        $this->finalised_date = date('Y-m-d');
        
        $this->postJournal();
        
        $this->save();
    }
    
    public static function formCostCodeSelect($costcodes)
    {
        if (count($costcodes) == 1)
        {
            return Form::hidden('cost_code_id', $costcodes[0]['id']);
        } else {
            return '<div class="col-2">'.Form::label('cost_code_id', 'Cost Code:').'</div>
                <div class="col-10" id="costCodeDiv">'.Form::select('cost_code_id', $costcodes, null, ['class' => 'form-control']).'</div>';
        }
    }
    
    public function getBoxAttribute()
    {
        return '<div class="row">
            <div class="col-2"><a href="'.route($this->routePrefix.'.show', $this->id).'">'.$this->person->name.'</a></div>
            <div class="col-1">&pound;'.$this->net.'</div>
            <div class="col-1">&pound;'.$this->vat.'</div>
            <div class="col-1">&pound;'.$this->gross.'</div>
            </div>';
    }
    
    public function recalculate()
    {
        $this->net = $this->lines()->sum('net');
        $this->vat = $this->lines()->sum('vat');
        $this->gross = $this->lines()->sum('gross');
        $this->save();
    }
}