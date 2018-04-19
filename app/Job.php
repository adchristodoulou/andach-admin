<?php

namespace App;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use BelongsToCompany;
	
    protected $table = 'jobs';
}
