<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'admin_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];
}
