<?php

namespace App;

use App\Traits\BelongsToCompany;
use App\Traits\BelongsToCostCode;
use App\Traits\BelongsToExpenseCode;
use Illuminate\Database\Eloquent\Model;

class TrialBalance extends Model
{
    use BelongsToCompany;
    use BelongsToCostCode;
    use BelongsToExpenseCode;

    protected $fillable = ['expense_code_id', 'cost_code_id', 'financial_period_id', 'company_id', 'debit_credit'];
    public $table = 'trial_balances';


}
