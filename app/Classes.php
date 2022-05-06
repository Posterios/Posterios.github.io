<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
   protected $table = "class";


    public function Users() {
        return $this->belongsTo('App\Users', 'id');
    }

    public function Projects() {
        return $this->hasMany('App\Projects', 'class_code');
    }
}
