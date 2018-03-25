<?php

namespace App\Traits;

use App\Document;
use App\Formulator;
use Auth;
use Illuminate\Http\Request;

trait Documented
{
	public function addDocument($object, Request $request)
	{
		$data = $request->all();
		$data['uploaded_by_id'] = Auth::id();

		if ($request->file('document'))
		{
			$path = $request->file('document')->store('documents');
			
			$data['url']       = $path;
			$data['extension'] = $request->file('document')->getClientOriginalExtension();
		}

		$document = new Document($data);

		$object->documents()->save($document);
	}

	public function documentedIndexData($route)
	{
		$return = array();

		$return['documents'] = $this->documents;
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