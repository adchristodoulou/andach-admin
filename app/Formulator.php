<?php

namespace App;

use App\FormulatorElement;
use Illuminate\Database\Eloquent\Model;

class Formulator extends Model
{
    protected $elements;
    protected $model;
    protected $setup;

    public function __construct($model = null, $setup = array())
    {
    	$this->autogenerateClasses = 'form-control';
        $this->autogenerateLabels = true;
        $this->model = $model;
		$this->setup = $setup;
    }

    public function addElement($array = array())
    {
    	$element = new FormulatorElement($array);

    	$this->elements[$array['name']] = $element;
    }

    public function constuctOpeningForm()
    {
    	$return = '<form action="'.$this->getSetupValue('action').'" autocomplete="'.$this->getSetupValue('autocomplete').'" enctype="'.$this->getFormEnctype().'" method="'.$this->getFormMethod().'" name="'.$this->getSetupValue('name').'" target="'.$this->getSetupValue('target').'">';
        $return .= csrf_field();

        return $return;
    }

    public function display()
    {
        $return = $this->constuctOpeningForm();
        foreach ($this->elements as $element)
        {
        	$return .= $element->display();
        }
        $return .= '</form>';
        return $return;
    }

    public function getFormEnctype()
    {
    	return 'application/x-www-form-urlencoded';
    	return 'multipart/form-data';
    }

	public function getFormMethod()
	{
		if ($this->getSetupValue('method') == 'get')
		{
			return 'get';
		} else {
			return 'post';
		}
	}

    public function getSetupValue($value)
    {
    	if (isset($this->setup[$value]))
    	{
    		return $this->setup[$value];
    	}

    	return null;
    }

    public function setSetupValue($key, $value = null)
    {
        if (is_array($key))
        {
            foreach ($key as $newKey => $value)
            {
                $this->setup[$newKey] = $value;
            }
        } else {
            $this->setup[$key] = $value;
        }
    }
}
