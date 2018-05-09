<?php

namespace App;

use App\Traits\Documented;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use Documented;

    protected $table = 'people';

    public function users()
    {
        return $this->hasMany('App\User', 'person_id');
    }
}
