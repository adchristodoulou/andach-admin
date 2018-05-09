<?php

namespace App;

use App\Traits\BelongsToCostCode;
use App\Traits\BelongsToPerson;
use App\Traits\HasCurrentValue;
use App\Traits\HasSingleFilename;
use App\Traits\IsInvoice;
use App\Traits\IsLedgerComponent;
use Form;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use BelongsToCostCode;
    use BelongsToPerson;
    use HasCurrentValue;
    use HasSingleFilename;
    use IsLedgerComponent;

    protected $fillable = ['ledger_id', 'cost_code_id', 'document_date', 'name', 'description', 'current_value', 'current_quantity', 'person_id', 'filename', 'net', 'vat', 'gross'];
    protected $table = 'purchase_invoices';
    
    public function addLine($array)
    {
        $this->lines()->create($array);
    }
    
    public function finalise()
    {
        $this->net = $this->lines()->sum('net');
        $this->vat = $this->lines()->sum('vat');
        $this->gross = $this->lines()->sum('gross');
        $this->unreconciled_gross = $this->lines()->sum('gross');
        $this->finalised_date = date('Y-m-d');
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
    
    public static function formLedgerSelect($ledgers)
    {
        if (count($ledgers) == 1)
        {
            return Form::hidden('ledger_id', $ledgers[0]['id']);
        } else {
            return '<div class="col-2">'.Form::label('ledger_id', 'Ledger').'</div>
                <div class="col-10">'.Form::select('ledger_id', $ledgers, null, ['class' => 'form-control', 'placeholder' => '-- please select ledger --']).'</div>';
        }
    }

    public function lines()
    {
    	return $this->hasMany('App\PurchaseInvoiceLine', 'purchase_invoice_id');
    }
}
