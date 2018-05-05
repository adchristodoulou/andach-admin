<?php

namespace App;

use App\Traits\BelongsToCompany;
use App\Traits\BelongsToFinancialPeriod;
use App\Traits\BelongsToPerson;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
	use BelongsToCompany;
	use BelongsToFinancialPeriod;
	use BelongsToPerson;

    protected $fillable = ['name', 'description', 'company_id', 'person_id'];
    protected $table = 'journals';

    public function lines()
    {
    	return $this->hasMany('App\JournalLine', 'journal_id');
    }
}
