<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait IsLedger
{
	public function journalLines()
	{
		return $this->morphMany('App\JournalLine', 'ledgerable');
	}
}