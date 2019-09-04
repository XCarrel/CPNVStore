<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    public $timestamps = false;
    public $table = 'users';

    public function applications() {
        return $this->belongsToMany(Application::class,'application_user','user_id','application_id');
    }
}
