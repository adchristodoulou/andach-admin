<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait IsLedgerComponent
{
	public function journalLines()
	{
		return $this->morphMany('App\JournalLine', 'componentable');
	}
}