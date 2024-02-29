<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";

    public function user_info()
    {
        return $this->hasOne('App\Model\UserInfo');
    }
}
