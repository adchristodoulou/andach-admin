<?php

namespace App;

use App\Traits\BelongsToJob;
use Illuminate\Database\Eloquent\Model;

class JobAuthorisedSalary extends Model
{
    use BelongsToJob;
}
