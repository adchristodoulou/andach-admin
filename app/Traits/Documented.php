<?php

namespace App\Traits;

use App\Document;
use App\Formulator;
use Auth;
use Illuminate\Http\Request;

trait Documented
{
	public function addDocument(Request $request, $previousDocumentID = null)
	{
		$data = Document::upload($request);

		$document = new Document($data);

		$this->documents()->save($document);

		$document->current_document_id = $document->id;
		$document->save();

		if ($previousDocumentID)
		{
			$document->linkTo($previousDocumentID);
		}
	}

	public function documentedIndexData($route)
	{
		$return = array();

		$return['documents'] = $this->documents->where('is_revised', 0);
		$return['name']      = $this->name;

		$form = new Formulator(['route' => $route]);
		$form->addElement(['type' => 'text', 'name' => 'name', 'title' => 'Name']);
		$form->addElement(['type' => 'date', 'name' => 'date_of_document', 'title' => 'Document Date']);
		$form->addElement(['type' => 'file', 'name' => 'document', 'title' => 'File to Upload']);
		$form->addElement(['type' => 'textarea', 'name' => 'description', 'title' => 'Comment or Description of the File (if needed)']);
		$form->addElement(['type' => 'submit', 'name' => 'submit', 'value' => 'Add Document or Comment', 'class' => 'btn btn-success']);

		$return['form'] = $form;

		return $return;
	}

	public function documents()
    {
        return $this->morphToMany('App\Document', 'documented');
    }
}