<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = "user_permission";
    protected $primaryKey = "remember_token";
}
