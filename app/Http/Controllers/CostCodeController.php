<?php

namespace App\Http\Controllers;

use App\CostCode;
use App\Formulator;
use Illuminate\Http\Request;

class CostCodeController extends Controller
{
	public function __construct()
	{
		$this->middleware('choosecompany');
	}

    public function create()
    {
    	$form = new Formulator(['route' => 'document.delete-post']);
    	$form->addElementsFromModel(CostCode::class);

    	return view('shared.form', ['form' => $form]);
    }
}
