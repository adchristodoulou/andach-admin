<?php

namespace App;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

class ReportingUnit extends Model
{
    use BelongsToCompany;
	use NestableTrait;
}
