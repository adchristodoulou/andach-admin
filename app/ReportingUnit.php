<?php

namespace App;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

class ReportingUnit extends Model
{
    use BelongsToCompany;
	use NestableTrait;

	public function positions()
	{
		return $this->hasMany('App\Position', 'reporting_unit_id');
	}
}
