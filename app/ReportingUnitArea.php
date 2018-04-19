<?php

namespace App;

use App\Traits\BelongsToCompany;
use App\Traits\BelongsToReportingUnit;
use Illuminate\Database\Eloquent\Model;

class ReportingUnitArea extends Model
{
    use BelongsToCompany;
    use BelongsToReportingUnit;
}
