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
    	$form->addElement(['type' => 'submit', 'value' => 'Delete This Document', 'name' => 'submit', 'class' => 'btn btn-danger']);

		return view('document.delete', ['document' => Document::find($id), 'form' => $form]);
    }

    public function edit($id)
    {
        $document = Document::find($id);
        $history  = $document->fullRevisionHistory();

        $form = new Formulator(['route' => 'document.edit-post'], $document);
        $form->addElement(['type' => 'hidden', 'name' => 'previous_document_id', 'value' => $id]);
        $form->addElement(['type' => 'text', 'name' => 'name', 'title' => 'Name']);
        $form->addElement(['type' => 'date', 'name' => 'date_of_document', 'title' => 'Document Date']);
        $form->addElement(['type' => 'file', 'name' => 'document', 'title' => 'File to Upload']);
        $form->addElement(['type' => 'textarea', 'name' => 'description', 'title' => 'Comment or Description of the File (if needed)']);
        $form->addElement(['type' => 'submit', 'name' => 'submit', 'value' => 'Update Document or Comment', 'class' => 'btn btn-success']);

    	return view('document.edit', ['document' => $document, 'form' => $form, 'history' => $history]);
    }

    public function editPost(Request $request)
    {
        $previousDocument = Document::find($request->previous_document_id);

        $previousDocument->addRevision($request);
    }
}
