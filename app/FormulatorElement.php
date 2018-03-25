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
		$this->class = $array['class'] ?? '';
		$this->id    = $array['id'] ?? '';
		$this->name  = $array['name'] ?? '';
		$this->title = $array['title'] ?? '';
		$this->type  = $array['type'] ?? '';
		$this->value = $array['value'] ?? '';
	}

	public function debug()
	{
		$array = [$this->class, $this->id, $this->name, $this->title, $this->type, $this->value];
		dd($array);
	}

    public function display()
    {
    	switch ($this->type)
    	{
    		case 'checkbox' :
    		case 'color' :
    		case 'date' :
    		case 'email' :
    		case 'hidden' :
    		case 'password' :
    		case 'submit' :
    		case 'text':
    			return '<div class="row"><div class="col-2"><label for="'.$this->id.'"">'.$this->title.'</label></div><div class="col-10">
			    	'.$this->displayElement().'
			    	</div></div>';
    			break;

    		case 'hidden' :
    			return $this->displayElement();
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
    	switch ($this->type)
    	{
    		case 'checkbox' :
    		case 'color' :
    		case 'date' :
    		case 'email' :
    		case 'hidden' :
    		case 'password' :
    		case 'submit' :
    		case 'text':
    			return '<input class="'.$this->class.'" id="'.$this->id.'" name="'.$this->name.'" type="'.$this->type.'" value="'.$this->value.'" />';
    			break;

    		case 'textarea' :
    			return '<textarea class="'.$this->class.'" id="'.$this->id.'" name="'.$this->name.'" type="'.$this->type.'">'.$this->value.'</textarea>';
    			break;

    		default:
    			return 'unsupported item type "'.$this->type.'"';
    			break;
    	}
    }
}
