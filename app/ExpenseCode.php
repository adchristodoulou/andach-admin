<?php

namespace App;

use App\Trait\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;

class ExpenseCode extends Model
{
	use BelongsToCompany;

    protected $fillable = ['name', 'company_id'];
    protected $table = 'expense_codes';

    public function bankAccounts()
    {
    	return $this->hasMany('App\BankAccount', 'expense_code_id');
    }

    public function fixedAssetCategory()
    {
        return $this->hasMany('App\fixedAssetCategory', 'expense_code_id');
    }

    public function journalLines()
    {
    	return $this->hasMany('App\JournalLine', 'expense_code_id');
    }

    public function purchaseLedgers()
    {
    	return $this->hasMany('App\PurchaseLedger', 'expense_code_id');
    }

    public function salesLedgers()
    {
    	return $this->hasMany('App\SalesLedger', 'expense_code_id');
    }

    public function stockLedgers()
    {
    	return $this->hasMany('App\StockLedger', 'expense_code_id');
    }

    public function trialBalances()
    {
    	return $this->hasMany('App\TrialBalance', 'expense_code_id');
    }
}
