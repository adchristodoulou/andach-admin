<?php

namespace App;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use BelongsToCompany;
}
