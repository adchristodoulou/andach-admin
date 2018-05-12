<?php

namespace App\Traits;

use Form;
use Illuminate\Http\Request;

trait IsLedgerComponent
{
    public static function formLedgerSelect($ledgers, $default = null)
    {
        if (count($ledgers) == 1)
        {
            return Form::hidden('ledger_id', $ledgers[0]['id']);
        } else {
            return '<div class="col-2">'.Form::label('ledger_id', 'Ledger').'</div>
                <div class="col-10">'.Form::select('ledger_id', $ledgers, $default, ['class' => 'form-control', 'placeholder' => '-- please select ledger --']).'</div>';
        }
    }
    
    public function isFinalised()
    {
        return $this->finalised_date !== null;
    }
    
	public function journalLines()
	{
		return $this->morphMany('App\JournalLine', 'componentable');
	}
    
    public function postJournal()
    {
        if ($this->isFinalised())
        {
            return false;
        }
        
        
    }
}