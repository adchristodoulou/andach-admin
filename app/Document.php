<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name', 'description', 'url', 'extension', 'date_of_document', 'date_of_upload', 'uploaded_by_id'];
    protected $table = 'documents';

    public function getBoxAttribute()
    {
    	return '<div class="row"><div class="col-12"><div class="card">
    		<div class="card-header">Document uploaded on '.$this->date_created.' by '.$this->uploader_name.'</div>
    		<div class="card-body">'.$this->description_and_document.'</div>
    		<div class="card-footer"><a href="'.route('document.edit', $this->id).'">Edit or Replace</a> <a href="'.route('document.edit', $this->id).'">Delete</a></div>
    		</div></div></div>';
    }

    public function getDescriptionAndDocumentAttribute()
    {
        return '<p>'.$this->description.'</p>'.$this->document_display;
    }

    public function getDocumentDisplayAttribute()
    {
        if ($this->url)
        {
            return $this->url;
        }

        return '';
    }

    public function getUploaderNameAttribute()
    {
        if ($this->uploaderPerson)
        {
            return $this->uploaderPerson->name;
        }

        return '#UNKNOWN USER#';
    }

    public function people()
    {
        return $this->morphedByMany('App\Person', 'documented');
    }

    public function uploaderPerson()
    {
        return $this->uploaderUser->belongsTo('App\Person', 'person_id');
    }

    public function uploaderUser()
    {
        return $this->belongsTo('App\User', 'uploaded_by_id');
    }
}
