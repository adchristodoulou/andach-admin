<?php

namespace App\Http\Controllers;

use App\Document;
use App\Formulator;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function delete($id)
    {
    	$form = new Formulator(['route' => 'document.delete-post', 'routeArray' => ['id' => $id]]);
    	$form->addElement(['type' => 'hidden', 'value' => $id, 'name' => 'id']);
    	$form->addElement(['type' => 'submit', 'value' => 'Delete This Document', 'name' => 'submit']);

		return view('document.delete', ['document' => Document::find($id), 'form' => $form]);
    }

    public function edit($id)
    {
    	return view('document.edit', Document::find($id));
    }
}
