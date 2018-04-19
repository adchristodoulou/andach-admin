<?php

namespace App;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;

class JobGrade extends Model
{
	use BelongsToCompany;
	
    protected $table = 'jobs_grades';
}
