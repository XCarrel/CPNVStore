<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users() {
        return $this->belongsToMany('App\AppUser','application_user','application_id','user_id');
    }

    public function platforms() {
        return $this->belongsToMany('\App\Platform')->withPivot('minversion');
    }
}
