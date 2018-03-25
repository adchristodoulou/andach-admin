<?php

namespace App\Http\Controllers;

use App\Formulator;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    function form()
    {
    	$form = new Formulator();
    	$form->addElement(['type' => 'text', 'name' => 'lol', 'value' => 'a', 'title' => 'text thing']);
    	$form->addElement(['type' => 'password', 'name' => 'l25ol', 'value' => 'a', 'title' => 'password1']);
    	$form->addElement(['type' => 'password', 'name' => 'l26262ol', 'value' => 'a', 'title' => 'password2']);
    	$form->addElement(['type' => 'hidden', 'name' => 'loasfl', 'value' => 'asfg']);
    	$form->addElement(['type' => 'textarea', 'name' => 'lasfol', 'value' => 'ass', 'title' => 'big text areas']);

    	return view('person.form', ['form' => $form]);
    }
}
