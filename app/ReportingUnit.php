<?php

namespace App;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;

class ReportingUnit extends Model
{
    use BelongsToCompany;
}
