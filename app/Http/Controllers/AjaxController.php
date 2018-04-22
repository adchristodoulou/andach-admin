<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function authSalariesForm($id)
    {
    	$company = Company::find($id);

    	return $company->formAuthSalaries();
    }

    public function gradeSelect($id)
    {
    	$company = Company::find($id);

        return $company->formGradeSelect();
    }
}
