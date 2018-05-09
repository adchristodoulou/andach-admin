<?php

namespace App\Http\Controllers;

use App\Company;
use App\BankAccount;
use App\PurchaseLedger;
use App\FixedAssetCategory;
use App\SalesLedger;
use App\StockLedger;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function authSalariesForm($id)
    {
    	$company = Company::find($id);

    	return $company->formAuthSalaries();
    }
    
    public function costCodeSelectBankAccount($ledgerID)
    {
        $ledger  = BankAccount::find($ledgerID);
        $company = Company::find($ledger->company_id);
        
        return $company->formCostCodes();
    }
    
    public function costCodeSelectFixedAssetCategory($ledgerID)
    {
        $ledger  = FixedAssetCategory::find($ledgerID);
        $company = Company::find($ledger->company_id);
        
        return $company->formCostCodes();
    }
    
    public function costCodeSelectPurchaseLedger($ledgerID)
    {
        $ledger  = PurchaseLedger::find($ledgerID);
        $company = Company::find($ledger->company_id);
        
        return $company->formCostCodes();
    }
    
    public function costCodeSelectSalesLedger($ledgerID)
    {
        $ledger  = SalesLedger::find($ledgerID);
        $company = Company::find($ledger->company_id);
        
        return $company->formCostCodes();
    }
    
    public function costCodeSelectStockLedger($ledgerID)
    {
        $ledger  = StockLedger::find($ledgerID);
        $company = Company::find($ledger->company_id);
        
        return $company->formCostCodes();
    }

    public function gradeSelect($id)
    {
        $company = Company::find($id);

        return $company->formGradeSelect();
    }

    public function jobSelect($id)
    {
        $company = Company::find($id);

        return $company->formjobSelect();
    }

    public function reportingUnitAreaSelect($id)
    {
        $company = Company::find($id);

        return $company->formReportingUnitAreaSelect();
    }

    public function reportingUnitSelect($id)
    {
        $company = Company::find($id);

        return $company->formReportingUnitSelect();
    }
}
