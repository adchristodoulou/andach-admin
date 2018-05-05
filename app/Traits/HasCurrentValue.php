<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HasCurrentValue
{
	public function getFormattedCurrentValueAttribute()
	{
		return '&pound;'.$this->number_format($this->current_value, 2);
	}
}