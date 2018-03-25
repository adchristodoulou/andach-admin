<?php

namespace App\Http\Controllers;

use App\Formulator;
use App\Person;
use App\Traits\DocumentedController;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //use DocumentedController;

    function documentsCreate()
    {
        
    }

	function documentsIndex()
	{
		$person = Person::find(1);

		return view('traits.documented.index', ['traitdata' => $person->documentedIndexData()]);
	}

    function form()
    {
    	$form = new Formulator();
    	$form->addElement(['type' => 'text', 'name' => 'lol', 'value' => 'a', 'title' => 'text thing']);
    	$form->addElement(['type' => 'password', 'name' => 'l25ol', 'value' => 'a', 'title' => 'password1']);
    	$form->addElement(['type' => 'password', 'name' => 'l26262ol', 'value' => 'a', 'title' => 'password2']);
    	$form->addElement(['type' => 'hidden', 'name' => 'loasfl', 'value' => 'asfg']);
    	$form->addElement(['type' => 'textarea', 'name' => 'lasfol', 'value' => 'ass', 'title' => 'big text areas']);
    	$form->addElement(['type' => 'radio', 'name' => 'la3jh3j45jsfol', 'value' => array(1 => 'first radio', 2 => 'second radio'), 'title' => 'big text areas', 'checked' => 1]);
    	$form->addElement(['type' => 'select', 'name' => 'lasfowerwl', 'value' => array(1 => 'first seelect', 2 => 'second seelect'), 'title' => 'big text areas', 'checked' => 2]);
    	$form->addElement(['type' => 'submit', 'name' => 'lol456', 'value' => 'a', 'title' => 'SUBMIZZLE']);

    	return view('person.form', ['form' => $form]);
    }
}
