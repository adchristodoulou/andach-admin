<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Document extends Model
{
    protected $fillable = ['name', 'description', 'url', 'extension', 'date_of_document', 'date_of_upload', 'uploaded_by_id', 'is_revised', 'number_of_revisions', 'current_document_id'];
    protected $table = 'documents';

    public function addRevision(Request $request)
    {
        $data = $request->all();
        $data['uploaded_by_id'] = Auth::id();

        if ($request->file('document'))
        {
            $path = $request->file('document')->store('documents');
            
            $data['url']       = $path;
            $data['extension'] = $request->file('document')->getClientOriginalExtension();
        }

        $data['is_revised']          = 0;
        $data['number_of_revisions'] = 0;

        $document = new Document($data);
        $document->save();

        $this->current_document_id = $document->id;
        $this->save();

        $document->linkTo($this);
    }

    public function copyRelationsFrom($previousDocument)
    {
        foreach ($previousDocument->people as $person)
        {
            $this->people()->attach($person);
        }
    }

    public function fullRevisionHistory()
    {
        return Document::where('current_document_id', $this->current_document_id)->get();
    }

    public function getBoxAttribute()
    {
    	return '<div class="row"><div class="col-12"><div class="card">
    		<div class="card-header">Document uploaded on '.$this->date_created.' by '.$this->uploader_name.'</div>
    		<div class="card-body">'.$this->description_and_document.'</div>
    		<div class="card-footer"><a href="'.route('document.edit', $this->id).'">Edit or Replace</a> <a href="'.route('document.delete', $this->id).'">Delete</a></div>
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
        if ($this->uploaderPerson())
        {
            return $this->uploaderPerson->name;
        }

        return '#UNKNOWN USER#';
    }

    /**
     * Makes a given document a revision of a previous one. 
     * @param type $previousDocumentID 
     * @return type
     */
    public function linkTo($previousDocument)
    {
        $this->previous_document_id = $previousDocument->id;
        $this->number_of_revisions  = $previousDocument->number_of_revisions + 1;
        $this->current_document_id  = $this->id;

        $previousDocument->subsequent_document_id = $this->id;
        $previousDocument->is_revised             = 1;
        $previousDocument->number_of_revisions    = $previousDocument->number_of_revisions + 1;
        $previousDocument->current_document_id    = $this->id;

        $this->save();
        $previousDocument->save();

        $this->copyRelationsFrom($previousDocument);
    }

    public function people()
    {
        return $this->morphedByMany('App\Person', 'documented');
    }

    public function uploaderPerson()
    {
        if ($this->uploaderUser)
        {
            return $this->uploaderUser->belongsTo('App\Person', 'person_id');
        }

        return null;
    }

    public function uploaderUser()
    {
        return $this->belongsTo('App\User', 'uploaded_by_id');
    }
}
