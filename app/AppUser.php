<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    public $timestamps = false;
    public $table = 'users';

    public function applications() {
        return $this->belongsToMany('App\Application','application_users','user_id','application_id');
    }
}
