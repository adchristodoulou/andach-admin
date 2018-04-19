<?php

namespace App\Http\Controllers;

use App\CostCode;
use App\Formulator;
use Illuminate\Http\Request;

class CostCodeController extends Controller
{
	public function __construct()
	{
		//$this->middleware('auth');
	}

    public function create()
    {
    	$form = new Formulator(['route' => 'document.delete-post']);
    	

    	return view('shared.form', ['form' => $form]);
    }

    public function index()
    {
        $costcodes = CostCode::nested()->get();

        return view('costcode.index', ['costcodes' => $costcodes]);
    }
}
