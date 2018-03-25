<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    public function getBoxAttribute()
    {
    	return '<div class="row"><div class="col-12"><div class="card">
    		<div class="card-header">a</div>
    		<div class="card-body">'.$this->description_and_document.'</div>
    		<div class="card-footer">Revisions</div>
    		</div></div></div>';
    }

    public function people()
    {
        return $this->morphedByMany('App\People', 'documented');
    }
}
