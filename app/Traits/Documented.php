<?php

namespace App\Traits;

use App\Formulator;

trait Documented
{
	public function documentedIndexData()
	{
		$return = array();

		$return['documents'] = $this->documents;
		$return['name']      = $this->name;

		$form = new Formulator([]);
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