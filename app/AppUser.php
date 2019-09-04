<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    public $timestamps = false;
    public $table = 'users';

    public function applicationsUsed() {
        return $this->belongsToMany(Application::class,'application_user','user_id','application_id');
    }

    public function applicationsSupplied() {
        return $this->belongsToMany(Application::class,'application_supplier','user_id','application_id')->withPivot('role_id');
    }
}
