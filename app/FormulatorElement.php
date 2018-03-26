<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormulatorElement extends Model
{
	protected $class;
	protected $id;
	protected $name;
	protected $title;
	protected $type;
	protected $value;

	public function __construct($array)
	{
		$this->checked = $array['checked'] ?? '';
		$this->class   = $array['class'] ?? '';
		$this->id      = $array['id'] ?? '';
		$this->name    = $array['name'] ?? '';
		$this->title   = $array['title'] ?? '';
		$this->type    = $array['type'] ?? '';
		$this->value   = $array['value'] ?? '';
	}

	public function debug()
	{
		$array = [$this->class, $this->id, $this->name, $this->title, $this->type, $this->value];
		dd($array);
	}

    public function display($autogenerateLabels = true, $autogenerateClasses = '', $overwriteBlankValue = '')
    {
    	if ($autogenerateLabels)
    	{
    		$this->id = $this->name;
    	}

    	if ($autogenerateClasses)
    	{
    		$this->class .= ' '.$autogenerateClasses;
    	}

    	if ($this->value == '')
    	{
    		$this->value = $overwriteBlankValue;
    	}

    	switch ($this->type)
    	{
    		case 'checkbox' :
    		case 'color' :
    		case 'date' :
    		case 'email' :
            case 'file' :
    		case 'hidden' :
    		case 'password' :
    		case 'radio' :
    		case 'select' :
    		case 'text':
    			return '<div class="row"><div class="col-2"><label for="'.$this->id.'"">'.$this->title.'</label></div><div class="col-10">
			    	'.$this->displayElement().'
			    	</div></div>';
    			break;

    		case 'hidden' :
    			return $this->displayElement();
    			break;

            case 'submit' :
                return '<div class="row"><div class="col-12">
                    '.$this->displayElement().'
                    </div></div>';
                break;

    		case 'textarea' :
    			return '<div class="row"><div class="col-12"><label for="'.$this->id.'"">'.$this->title.'</label></div><div class="col-12">
			    	'.$this->displayElement().'
			    	</div></div>';
    			break;

    		default:
    			return 'unsupported item type "'.$this->type.'"';
    			break;
    	}
    }

    public function displayElement()
    {
        if ($this->type == 'file')
        {
            $this->class = 'form-control-file';
        }

    	switch ($this->type)
    	{
    		case 'checkbox' :
    		case 'color' :
    		case 'date' :
    		case 'email' :
            case 'file' :
    		case 'hidden' :
    		case 'password' :
    		case 'submit' :
    		case 'text':
    			return '<input class="'.$this->class.'" id="'.$this->id.'" name="'.$this->name.'" type="'.$this->type.'" value="'.$this->value.'" />';
    			break;

    		case 'radio' :
    			return implode($this->displayElementItems(), '<br />');
    			break;

    		case 'select' :
    			return '<select  class="'.$this->class.'" id="'.$this->id.'" name="'.$this->name.'">'.implode($this->displayElementItems()).'</select>';
    			break;

    		case 'textarea' :
    			return '<textarea class="'.$this->class.'" id="'.$this->id.'" name="'.$this->name.'">'.$this->value.'</textarea>';
    			break;

    		default:
    			return 'unsupported item type "'.$this->type.'"';
    			break;
    	}
    }

    /**
     * Used for the display of items like radios and selects which require an array of values. 
     * @return type
     */
    public function displayElementItems()
    {
    	$return = array();

    	if ($this->type == 'radio')
    	{
    		foreach ($this->value as $key => $value)
    		{
    			if ($key == $this->checked)
    			{
    				$checked = ' checked="checked"';
    			} else {
    				$checked = '';
    			}

    			$return[] = '<input type="radio" name="'.$this->name.'" value="'.$key.'"'.$checked.'>'.$value;
    		}
    	} elseif ($this->type == 'select') {
    		foreach ($this->value as $key => $value)
    		{
    			if ($key == $this->checked)
    			{
    				$checked = ' selected="selected"';
    			} else {
    				$checked = '';
    			}
    			$return[] = '<option name="'.$this->name.'" value="'.$key.'"'.$checked.'>'.$value.'</option>';
    		}
    	}

    	return $return;
    }

    public function getName()
    {
    	return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }
}
