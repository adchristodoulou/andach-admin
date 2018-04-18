<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

class CostCode extends Model
{
	use NestableTrait;

	public function children()
	{
		return $this->hasMany('App\CostCode', 'parent_id');
	}

	public function parent()
	{
		return $this->belongsTo('App\CostCode', 'parent_id');
	}
}
