<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users() {
        return $this->belongsToMany(AppUser::class,'application_user','application_id','user_id');
    }

    public function platforms() {
        return $this->belongsToMany(Platform::class)->withPivot('minversion');
    }

    public function suppliers() {
        return $this->belongsToMany(AppUser::class,'application_supplier','application_id','user_id')->withPivot('role_id');
    }

}
