<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = "user_info";

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
