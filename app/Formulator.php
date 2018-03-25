<?php

namespace App;

use App\FormulatorElement;
use Illuminate\Database\Eloquent\Model;

class Formulator extends Model
{
    protected $elements;
    protected $model;
    protected $setup;

    public function __construct($setup, $model = null)
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
    	$return = '<form action="'.$this->getFormAction().'" autocomplete="'.$this->getSetupValue('autocomplete').'" enctype="'.$this->getFormEnctype().'" method="'.$this->getFormMethod().'" name="'.$this->getSetupValue('name').'" target="'.$this->getSetupValue('target').'">';
        $return .= csrf_field();

        return $return;
    }

    public function display()
    {
        $return = $this->constuctOpeningForm();
        foreach ($this->elements as $element)
        {
        	$return .= $element->display($this->autogenerateLabels, $this->autogenerateClasses);
        }
        $return .= '</form>';
        return $return;
    }

    public function getFormAction()
    {
    	if ($this->getSetupValue('route'))
    	{
    		return route($this->getSetupValue('route'));
    	}
    	return $this->getSetupValue('action');
    }

    public function getFormEnctype()
    {
        foreach ($this->elements as $element)
        {
            if ($element->getType() == 'file')
            {
                return 'multipart/form-data';
            }
        }
    	return 'application/x-www-form-urlencoded';
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
